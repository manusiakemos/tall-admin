<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class CrudController extends Controller
{
    public $allfields;
    public $fields;
    public $pk;
    public string $className;
    public string $classNameLower;
    public string $table;
    public string $classNameSlug;
    public bool $upload;
    public $modal;

    public function index()
    {
        return view("vendor.crudgen.index");
    }

    public function data()
    {
        $get_json = file_get_contents(base_path("/database/json/crudgen.json"));
        return response()->json(json_decode($get_json, true));
    }

    public function truncate(Request $request)
    {
        $data = json_encode($request->data);
        $save = file_put_contents(base_path("/database/json/crudgen.json"), $data);
        return response()->json(['status' => $save, 'message' => 'Successfully generated']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fields' => 'required'
        ]);
        $fields_all = collect($request->fields);
        $this->allfields = $fields_all;
        $this->fields = $fields_all->where("primary", false);
        $this->pk = $fields_all->where('primary', true)->first();
        $this->className = $request->class;
        $this->classNameLower = Str::snake($request->class, "_");
        $this->classNameSlug = strtolower(Str::snake($request->class, "-"));
        $this->table = $request->table;
        $this->modal = $request->modal;
        $this->upload = $request->upload;

        $this->handleRequest($request);
        if ($request->migrate) {
            Artisan::call("migrate");
        }

        $get_json = file_get_contents(base_path("/database/json/crudgen.json"));
        $array = json_decode($get_json, true);
        $collection = collect($array);
        $data = $collection->where("class", $request->class)->first();
        $x = collect($request->all());
        if ($data) {
            $filtered = $collection->reject(function ($value, $key) use ($request) {
                return $value['class'] == $request->class;
            });
            $array = $filtered->toArray();
            $json = [];
            foreach ($array as $item){
                $json[] = $item;
            }
            $json[] = $x;
        } else {
            $collection->push($x);
            $json = $collection->toArray();
        }
        $save = file_put_contents(base_path("/database/json/crudgen.json"), json_encode($json));

        return response()
            ->json(['status' => $save ? '200' : '403', 'message' => $save ? 'Successfully Generated' : 'Something Wrong Happend']);
    }

    private function handleRequest(Request $request)
    {
        if ($request->router) {
            $this->generateRouter();
        }

        if ($request->model) {
            $this->generateModel();
        }

        if ($request->controller) {
            $this->generateLivewire();
        }

        if ($request->migration) {
            $this->generateMigration();
        }

        if ($request->view) {
            $this->generateView();
        }

        Artisan::call("ide-helper:models", ['--write' => 'true']);

        return true;
    }

    private function generateModel()
    {

        $primarykey = $this->pk['name'];

        $stubTemplate = [
            '{@className}',
            '{@table}',
            '{@primaryKey}'
        ];

        $stubReplaceTemplate = [
            $this->className,
            $this->table,
            $primarykey
        ];

        $stub_template = file_get_contents(base_path("stubs/custom-model.stub"));
        $modelTemplate = str_replace($stubTemplate, $stubReplaceTemplate, $stub_template);

        $path = app_path("/Models");
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

        file_put_contents(app_path("Models/{$this->className}.php"), $modelTemplate);
    }

    /*
   |--------------------------------------------------------------------------
   | Generated Livewire class
   |--------------------------------------------------------------------------
   |
   | generate livewire class function
   |
   */

    private function generateLivewire()
    {
        $handleRequest = View::make('vendor.crudgen._helper_handle_request', [
            'fields' => $this->fields,
            'classNameLower' => $this->classNameLower
        ])->render();

        $validate = View::make('vendor.crudgen._helper_validate_generator', [
            'field_validate' => $this->fields->where('validations', true),
            'classNameLower' => $this->classNameLower
        ])->render();

        $columns = View::make('vendor.crudgen._helper_columns', [
            'fields' => $this->fields,
            'classNameLower' => $this->classNameLower
        ])->render();

        $generatedProps = View::make('vendor.crudgen._helper_props', [
            'pk' => $this->pk['name'],
            'fields' => $this->fields,
        ])->render();

        $stubTemplate = [
            '{@primaryKey}',
            '{@className}',
            '{@classNameLower}',
            '{@handleRequest}',
            '{@validate}',
            '{@columns}',
            '{@generatedProps}',
        ];
        $stubReplaceTemplate = [
            $this->pk['name'],
            $this->className,
            $this->classNameLower,
            $handleRequest,
            $validate,
            $columns,
            $generatedProps,
        ];

        if ($this->modal) {
            $stub_template = file_get_contents(base_path("stubs/custom_livewire_modal.stub"));
        } else {
            $stub_template = file_get_contents(base_path("stubs/custom_livewire.stub"));
        }
        $template = str_replace($stubTemplate, $stubReplaceTemplate, $stub_template);
        $path = app_path("/Http/Livewire/{$this->className}");
        File::isDirectory($path) or File::makeDirectory($path, 0775, true, true);
        file_put_contents(app_path("/Http/Livewire/{$this->className}/{$this->className}Page.php"), $template);

        if ($this->modal) {
            $stub_template = file_get_contents(base_path("stubs/custom_livewire_modal_trait.stub"));
        } else {
            $stub_template = file_get_contents(base_path("stubs/custom_livewire_trait.stub"));
        }
        $template = str_replace($stubTemplate, $stubReplaceTemplate, $stub_template);
        file_put_contents(app_path("/Http/Livewire/{$this->className}/{$this->className}State.php"), $template);
        if (!$this->modal) {
            $stub_template = file_get_contents(base_path("stubs/custom_livewire_form.stub"));
            $template = str_replace($stubTemplate, $stubReplaceTemplate, $stub_template);
            file_put_contents(app_path("/Http/Livewire/{$this->className}/{$this->className}Form.php"), $template);
        }

        $stub_template = file_get_contents(base_path("stubs/table_class.stub"));
        $template = str_replace($stubTemplate, $stubReplaceTemplate, $stub_template);
        file_put_contents(app_path("/Http/Livewire/{$this->className}/{$this->className}Table.php"), $template);
    }

    /*
   |--------------------------------------------------------------------------
   | Generate Router
   |--------------------------------------------------------------------------
   |
   | auto generate router function
   |
   */

    private function generateRouter()
    {
        $route = 'Route::get("/' . $this->classNameLower . '", App\Http\Livewire\\' . $this->className . '\\' . $this->className . 'Page::class)->name("' . $this->classNameLower . '");';
        File::append(base_path("routes/web.php"), $route);

        if (!$this->modal) {
            $route2 = "\n" . 'Route::get("/' . $this->classNameLower . '/form/{' . $this->pk['name'] . '?}", App\Http\Livewire\\' . $this->className . '\\' . $this->className . 'Form::class)->name("' . $this->classNameLower . '.form");';
            File::append(base_path("routes/web.php"), $route2);
        }
    }

    /*
  |--------------------------------------------------------------------------
  | Generate Migration
  |--------------------------------------------------------------------------
  |
  | auto generate migration function
  |
  */

    private function generateMigration()
    {
        $generatedColumns = View::make("vendor.crudgen._helper_migration", [
            'fields' => $this->allfields
        ])->render();
        $search = [
            '{@className}', '{@tableName}', '{@generatedColumns}', '{@classNameSlug}', '{@classNameLower}',
        ];
        $replace = [
            $this->className, $this->table, $generatedColumns, $this->classNameLower, $this->classNameLower
        ];

        $subject = file_get_contents(base_path("stubs/migration.stub"));
        $index_replace_template = str_replace($search, $replace, $subject);
        file_put_contents(database_path("/migrations/2020_01_01_000000_create_{$this->classNameLower}_table.php"), $index_replace_template);
    }

    /*
     |--------------------------------------------------------------------------
     | Generate View
     |--------------------------------------------------------------------------
     |
     | auto generate view file function
     | main view, form view, table action view, confirm box view
     |
     */
    private function generateView()
    {
        $this->generateViewPage();
        $this->generateFormView();
        $this->generateActionView();
        $this->generateConfirmView();
    }

    private function generateConfirmView()
    {
        $search = [
            '{@className}', '{@tableName}', '{@classNameSlug}', '{@classNameLower}', '{@primaryKey}',
        ];
        $replace = [
            $this->className, $this->table, $this->classNameSlug, $this->classNameLower, $this->pk['name']
        ];

        $subject = file_get_contents(base_path("stubs/confirm.stub"));
        $index_replace_template = str_replace($search, $replace, $subject);
        file_put_contents(base_path("resources/views/livewire/{$this->classNameLower}/_{$this->classNameLower}-confirm.blade.php"), $index_replace_template);
    }

    private function generateViewPage()
    {
        $stubTemplate = [
            '{@primaryKey}',
            '{@className}',
            '{@classNameSlug}',
            '{@classNameLower}',
        ];
        $stubReplaceTemplate = [
            $this->pk['name'],
            $this->className,
            $this->classNameSlug,
            $this->classNameLower,
        ];
        if ($this->modal) {
            $stub_template = file_get_contents(base_path("stubs/page_modal.stub"));
        } else {
            $stub_template = file_get_contents(base_path("stubs/page.stub"));
        }
        $template = str_replace($stubTemplate, $stubReplaceTemplate, $stub_template);
        $path = resource_path("views/livewire/{$this->classNameLower}");
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $pathToWrite = resource_path("views/livewire/{$this->classNameLower}/{$this->classNameLower}-page.blade.php");
        file_put_contents($pathToWrite, $template);

    }

    public function generateFormView()
    {
        $forms = View::make("vendor.crudgen._helper_form", [
            'fields' => $this->fields,
            'model' => $this->classNameLower
        ])->render();

        $forms = str_replace("xxx", "x", $forms);

        $search = [
            '{@className}', '{@tableName}', '{@forms}', '{@classNameSlug}', '{@classNameLower}',
        ];
        $replace = [
            $this->className, $this->table, $forms, $this->classNameSlug, $this->classNameLower
        ];


        if ($this->modal) {
            $stub_template = file_get_contents(base_path("stubs/form_modal.stub"));
            $pathToWrite = resource_path("views/livewire/{$this->classNameLower}/_{$this->classNameLower}-form.blade.php");
        } else {
            $stub_template = file_get_contents(base_path("stubs/form.stub"));
            $pathToWrite = resource_path("views/livewire/{$this->classNameLower}/{$this->classNameLower}-form.blade.php");
        }

        $template = str_replace($search, $replace, $stub_template);
        $path = resource_path("views/livewire/{$this->classNameLower}");
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

        file_put_contents($pathToWrite, $template);
    }

    public function generateActionView()
    {
        $stubTemplate = [
            '{@primaryKey}',
            '{@className}',
            '{@classNameLower}',
        ];
        $stubReplaceTemplate = [
            $this->pk['name'],
            $this->className,
            $this->classNameLower,
        ];
        if ($this->modal) {
            $stub_template = file_get_contents(base_path("stubs/action_modal.stub"));
        } else {
            $stub_template = file_get_contents(base_path("stubs/action.stub"));
        }
        $template = str_replace($stubTemplate, $stubReplaceTemplate, $stub_template);
        $path = resource_path("views/livewire/{$this->classNameLower}");
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $pathToWrite = resource_path("views/livewire/{$this->classNameLower}/_{$this->classNameLower}-action.blade.php");
        file_put_contents($pathToWrite, $template);
    }

}

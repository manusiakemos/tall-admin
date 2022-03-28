<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class GenerateCrudFromDb extends Command
{
    public $crudJson;

    public $tables = [];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:crud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate crud from database to crudgen.json file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tables = Schema::getConnection()
            ->getDoctrineSchemaManager()
            ->listTableNames();
        foreach ($tables as $table) {
            $this->tables[] = $this->handleTable($table);
        }
        File::put(database_path('json/crudgen.json'), json_encode($this->tables));

        $this->info('generate database to json success');
    }

    public function handleTable(string $table)
    {
        $fields = $this->handleFields($table);
        return [
            "class" => ucwords(Str::camel($table)),
            "table" => $table,
            "router" => true,
            "view" => true,
            "spa" => false,
            "model" => true,
            "modal" => true,
            "controller" => true,
            "seeder" => false,
            "migration" => true,
            "migrate" => false,
            "upload" => false,
            "fields" => $fields
        ];
    }

    public function handleFields($table)
    {
        $fieldJson = [];
        Schema::getConnection()
            ->getDoctrineSchemaManager()
            ->getDatabasePlatform()
            ->registerDoctrineTypeMapping('enum', 'string');
        $columns = Schema::getConnection()
            ->getDoctrineSchemaManager()
            ->listTableColumns($table);
        foreach ($columns as $column){
            $fieldJson[] = [
                "name" => $column->getName(),
                "primary" => $column->getAutoincrement(),
                "dbType" => $column->getType()->getName(),
                "label" => Str::camel($column->getName()),
                "length" => $column->getLength(),
                "nullable" => !$column->getNotnull(),
                "default" => $column->getDefault(),
                "htmlType" => "text",
                "validations" => true,
                "searchable" => true,
                "printable" => true,
                "faker" => false
            ];
        }

        return $fieldJson;
    }
}

<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SettingTable extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey("setting_id")
            ->setThAttributes(function (Column $column) {
                if (in_array($column->getTitle(), ['Action'])) {
                    return [
                        'default' => true,
                        'class' => 'text-center',
                    ];
                }
                return ['default' => true];
            });
    }

    public bool $perPageAll = true;

    public array $bulkActions = [
        'destroySelected' => 'Hapus',
    ];

    public function destroySelected()
    {
        Setting::whereIn($this->primaryKey, $this->getSelected())->delete();
        $this->emit("showToast", ["message" => "Settings Deleted Successfully", "type" => "success"]);
    }

    public function columns(): array
    {
        return [
            Column::make('Key', 'setting_key')
                ->searchable()
                ->sortable(),
            Column::make('Name', 'setting_name')
                ->searchable()
                ->sortable(),
            Column::make('Value', 'setting_value')
                ->searchable()
                ->sortable(),
            Column::make('Input type', 'setting_input')
                ->searchable()
                ->sortable(),
            Column::make("Action", "setting_id")
                ->html()
                ->format(function ($value, Setting $row) {
                    return view('livewire.setting._setting-action', compact('row'));
                }),
        ];
    }

    public function builder(): Builder
    {
        return Setting::orderBy('setting_order', 'asc');
    }
}

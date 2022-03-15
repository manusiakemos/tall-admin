<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SettingTable extends DataTableComponent
{

    //public string $defaultSortColumn = '';
    //public string $defaultSortDirection = 'asc';
    public bool $perPageAll = true;

    public array $bulkActions = [
        'destroySelected' => 'Hapus Data Terpilih',
    ];

    protected int $index = 0;
    public string $primaryKey = "setting_id";

    public function destroySelected()
    {
        Setting::whereIn($this->primaryKey, $this->selectedRowsQuery()->pluck($this->primaryKey))->delete();
        $this->emit("showToast", ["message" => "Settings Deleted Successfully", "type" => "success"]);
    }

    public function columns(): array
    {
        if ($this->page > 1) {
            $this->index = ($this->page - 1) * $this->perPage;
        } else {
            $this->index = 0;
        }

        return [
            Column::make(__('No.'))->format(function () {
                return ++$this->index;
            }),

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
            Column::make("Action")
                ->asHtml()
                ->format(function ($value, $column, Setting $row) {
                    return view('livewire.setting._setting-action', compact('row'));
                }),
        ];
    }

    public function query(): Builder
    {
        return Setting::orderBy('setting_order', 'asc');
    }
}

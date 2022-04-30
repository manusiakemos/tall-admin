<?php

namespace App\Http\Livewire\Slider;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class SliderTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey("slider_id")
            ->setUseHeaderAsFooterEnabled()
            ->setPerPageAccepted([-1, 10, 25, 50])
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

    public function filters(): array
    {
        return [
            SelectFilter::make('Active')
                ->setFilterPillTitle('User Status')
                ->setFilterPillValues([
                    '1' => 'Active',
                    '0' => 'Inactive',
                ])
                ->options([
                    '' => 'All',
                    '1' => 'Yes',
                    '0' => 'No',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('slider_active', true);
                    } elseif ($value === '0') {
                        $builder->where('slider_active', false);
                    }
                }),
        ];
    }

    public array $bulkActions = [
        'destroySelected' => 'Hapus Data',
        'activate' => 'Aktifkan',
        'deactivate' => 'Nonaktifkan'
    ];

    public function destroySelected()
    {
        Slider::whereIn($this->primaryKey, $this->getSelected())->delete();
        $this->emit("showToast", ["message" => "Sliders Deleted Successfully", "type" => "success"]);
        $this->clearSelected();
    }

    public function activate()
    {
        Slider::whereIn($this->primaryKey, $this->getSelected())->update(['slider_active' => true]);
        $this->clearSelected();
    }

    public function deactivate()
    {
        Slider::whereIn($this->primaryKey, $this->getSelected())->update(['slider_active' => false]);
        $this->clearSelected();
    }

    public function columns(): array
    {
        return [
            Column::make('Title', 'slider_title')
                ->searchable()
                ->sortable(),
            Column::make('Image', 'slider_image')
                ->format(function ($value) {
                    $path = asset('storage/uploads/slider/'.$value);
                    return view('vendor.livewire-tables.includes.columns.custom_image', ['path' => $path]);
                })
                ->html(),
            BooleanColumn::make('Active', 'slider_active')
                ->searchable()
                ->sortable(),
            Column::make("Action", 'slider_id')
                ->collapseOnTablet()
                ->html()
                ->format(function ($value, $row, $column) {
                    return view('livewire.slider._slider-action', compact('row'));
                }),
        ];
    }

    public function builder(): Builder
    {
        return Slider::query()
            ->when($this->getAppliedFilterWithValue('active'), function ($query, $active) {
                return $query->where('slider_active', $active);
            });
    }
}

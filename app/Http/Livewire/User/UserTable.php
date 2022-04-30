<?php

namespace App\Http\Livewire\User;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class UserTable extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey("user_id")
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

    public array $bulkActions = [
        'destroySelected' => 'Hapus',
    ];

    public function destroySelected()
    {
        User::whereIn($this->primaryKey, $this->getSelected())->delete();
        $this->emit("showToast", ["message" => "Users Deleted Successfully", "type"=>"success"]);
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Role')
                ->options([
                    '' => 'All',
                    'super-admin' => 'Super Admin',
                    'admin' => 'Admin',
                ]),
        ];
    }


    public function columns(): array
    {
        return [
            Column::make('Name','name')
                ->searchable()
                ->sortable(),
            Column::make('Username', 'username')
                ->searchable()
                ->sortable(),
            Column::make('E-mail', 'email')
                ->searchable()
                ->sortable(),
            Column::make('Role', 'role')
                ->searchable()
                ->sortable(),
            Column::make("Action", "user_id")
                ->html()
                ->format(function ($value, $row) {
                    return view('livewire.user._user-action', compact('row'));
                }),
        ];
    }

    public function builder(): Builder
    {
        return User::query()
            ->when($this->getAppliedFilterWithValue('role'), fn($query, $value) => $query->where('role', $value));
    }
}

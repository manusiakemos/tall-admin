<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserStats extends Component
{
    public $roles = ['admin', 'super-admin'];
    public $rolesOptions = ['admin', 'super-admin'];

    public function mount(Request $request)
    {

    }

    public function render()
    {
        $pieChartModel = LivewireCharts::pieChartModel()
            ->setTitle('Users Group By Role')
            ->withDataLabels();

        $userRoles = User::select(['role', DB::raw('count(*) as value')])
            ->whereIn('role', $this->roles)
            ->groupBy('role')
            ->get();

        foreach ($userRoles as $role) {
            $color = '#' . stringToColorCode($role->role);
            $value = $role->value;
            $title = $role->role;

            $pieChartModel->addSlice($title, $value, $color);

        }

        return view('livewire.admin.user-stats', compact('pieChartModel'));
    }
}

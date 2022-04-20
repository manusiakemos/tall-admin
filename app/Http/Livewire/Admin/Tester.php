<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Tester extends Component
{
    public $date_range = [
        "2022-03-01", "2022-04-01"
    ];

    public function render()
    {
        return view('livewire.admin.tester');
    }

    public function save()
    {
        dd($this->date_range);
    }

    public function updatedDateRange($newValue)
    {
        dd($newValue);
    }
}

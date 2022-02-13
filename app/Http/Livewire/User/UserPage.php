<?php


namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserPage extends Component
{
    use UserState;

    protected $listeners = ['create', 'edit'];

    public function mount()
    {
        session()->put('active', 'user');
        session()->put('expanded', 'admin');
        $this->options['role'] = User::$role;
    }

    public function render()
    {
        return view('livewire.user.user-page')
            ->layout('layouts.admin');
    }

}

<?php


namespace App\Http\Livewire\Setting;


use App\Models\Setting;
use Livewire\Component;

class SettingPage extends Component
{
    use SettingState;

    protected $listeners = ['create', 'edit'];

    public function mount()
    {
        $this->options = Setting::$options;
        session()->put('active', 'setting');
        session()->put('expanded', 'admin');
    }

    public function render()
    {
        return view('livewire.setting.setting-page')
            ->layout('layouts.admin');
    }

     public function save()
        {
            $this->updateMode ? $this->update() : $this->store();
        }

         public function hydrate()
         {
                $this->resetErrorBag();
                $this->resetValidation();
          }

}

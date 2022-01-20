<?php

namespace App\View\Components\Input;

use App\Models\Theme;
use App\View\Components\Traits\SelectOptionsTrait;
use Illuminate\View\Component;

class Select extends Component
{
    use SelectOptionsTrait;

    public string $value;

    public string $text;

    public $options;

    public string $placeholder = "";

    public array $initialValue = [];

    public string $method;

    public bool $select2;

    public $filter = null;


    public function __construct($method, $select2, $options=null, $value="", $text="", $filter = null)
    {
        $this->method = $method;
        $this->select2 = $select2;
        $this->filter = $filter;
        $this->options = $options;
        $this->value = $value;
        $this->text = $text;
    }

    public function updatedValue($value)
    {
        $this->dispatchBrowserEvent("initSelect2");
        dd("a");
    }


    public function render()
    {
        if (!$this->options && !$this->text && !$this->value) {
            $method = $this->method;
            if (!method_exists($this, $method)) {
                abort(403, "No Method Exists On Select Trait");
            }
            $x = collect($this->{$method}());
        }else{
            $x = collect($this->options);
        }

        if ($this->select2) {
            $this->options = $x->toArray();
            return view('components.input.select');
        } else {
            $this->options = $x->toArray();
            return view('components.input.custom-select2');
        }
    }
}

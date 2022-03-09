<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;

class Modal extends Component
{
    public string $title;

    public function __construct($title="")
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.ui.modal');
    }
}

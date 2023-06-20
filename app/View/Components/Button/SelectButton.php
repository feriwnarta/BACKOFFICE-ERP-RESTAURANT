<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectButton extends Component
{
    public string $label;
    public string $class;
    public string $id;
    public string $placeHolder;
    public string $optional;
    /**
     * Create a new component instance.
     */
    public function __construct(string $label, string $placeHolder, string $class, string $id = "", string $optional = "")
    {
        $this->label = $label;
        $this->class = $class;
        $this->id = $id;
        $this->placeHolder = $placeHolder;
        $this->optional = $optional;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.select-button');
    }
}

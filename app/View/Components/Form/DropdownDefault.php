<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownDefault extends Component
{
    
    public string $label;
    public string $class;
    public string $placeHolder;
    /**
     * Create a new component instance.
     */
    public function __construct(string $label, string $placeHolder, string $class)
    {
        $this->label = $label;
        $this->class = $class;
        $this->placeHolder = $placeHolder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.dropdown-default');
    }
}

<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownNoIcon extends Component
{
    public string $id;
    public string $class;
    public string $text;

    /**
     * @param string $id
     * @param string $class
     * @param string $text
     */
    public function __construct(string $id, string $class, string $text)
    {
        $this->id = $id;
        $this->class = $class;
        $this->text = $text;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.dropdown-no-icon');
    }
}


<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarTextOnly extends Component

{
    public string $class;
    public string $text;
    public string $variant;

    /**
     * @param string $class
     * @param string $text
     */
    public function __construct(string $class, string $text, string $variant)
    {
        $this->class = $class;
        $this->text = $text;
        $this->variant = $variant;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.text-only');
    }
}

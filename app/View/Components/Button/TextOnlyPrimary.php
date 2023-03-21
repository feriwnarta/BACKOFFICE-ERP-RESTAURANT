<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextOnlyPrimary extends Component
{
    public string $id;
    public string $class;
    public string $text;
    public string $onClick;

    /**
     * @param string $id
     * @param string $text
     */
    public function __construct(string $id, string $class, string $text, string $onClick)
    {
        $this->id = $id;
        $this->class = $class;
        $this->text = $text;
        $this->onClick = $onClick;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.text-only-primary');
    }
}

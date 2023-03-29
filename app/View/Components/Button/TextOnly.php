<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextOnly extends Component

{
    public string $class;
    public string $id;
    public string $text;
    public string $variant;
    public string $link;
    public string $method;

    /**
     * @param string $class
     * @param string $text
     */
    public function __construct(string $class,string $id, string $text, string $variant, string $link, string $method)
    {
        $this->class = $class;
        $this->text = $text;
        $this->variant = $variant;
        $this->link = $link;
        $this->method = $method;
        $this->id = $id;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.text-only');
    }
}

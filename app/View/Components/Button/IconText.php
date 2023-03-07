<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IconText extends Component
{
    public string $class;
    public string $icon;
    public string $text;
    public string $toggle;
    public string $idTarget;
    public string $link;
    public string $method;

    /**
     * @param string $class
     * @param string $icon
     * @param string $text
     * @param string $toggle
     * @param string $idTarget
     */
    public function __construct(string $class, string $icon, string $text, string $toggle, string $idTarget, string $link, string $method)
    {
        $this->class = $class;
        $this->icon = $icon;
        $this->text = $text;
        $this->toggle = $toggle;
        $this->idTarget = $idTarget;
        $this->link = $link;
        $this->method = $method;
    }






    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.icon-text');
    }
}

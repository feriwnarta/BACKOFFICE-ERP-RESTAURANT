<?php

namespace App\View\Components\button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextOnlyOutlined extends Component
{
    public string $id;
    public string $class;
    public string $text;
    public string $onClick;
    public string $dismiss;

    /**
     * Create a new component instance.
     */
    public function __construct(string $id, string $class, string $text, string $onClick, string $dismiss = '')
    {

        $this->id = $id;
        $this->class = $class;
        $this->text = $text;
        $this->onClick = $onClick;
        $this->dismiss = $dismiss;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.text-only-outlined');
    }
}

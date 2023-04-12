<?php

namespace App\View\Components\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalScrollable extends Component
{
    public string $id;
    public string $title;
    public string $icon;
    
    /**
     * Create a new component instance.
     */
    public function __construct(string $id, string $title, string $icon)
    {
        $this->id = $id;
        $this->title = $title;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.modal-scrollable');
    }
}

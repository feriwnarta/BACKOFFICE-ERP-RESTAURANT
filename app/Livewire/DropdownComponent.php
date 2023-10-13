<?php

namespace App\Livewire;

use Livewire\Component;

class DropdownComponent extends Component
{
    public string $class;
    public string $id;
    public string $text;

    public function render()
    {
        return view('livewire.dropdown-component');
    }
}

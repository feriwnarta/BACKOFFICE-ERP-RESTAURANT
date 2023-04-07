<?php

namespace App\View\Components\List;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListOfIngredients extends Component
{

//     {{-- Component ini digunakan untuk membuat item ingredients --}}
// {{-- idItem => id item dari database --}}
// {{-- itemImage => gambar item --}}
// {{-- itemName => nama item --}}

    public string $idItem;
    public string $itemName;
    public string $itemImage;

    /**
     * Create a new component instance.
     */
    public function __construct(string $idItem, string $itemImage,  string $itemName)
    {
        $this->idItem = $idItem;
        $this->itemName= $itemName;
        $this->itemImage = $itemImage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.list.list-of-ingredients');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosController extends Controller
{
    public function menu(Request $request)
    {
        return view('point-of-sales.pos-menu');
    }

    public function createMenu(Request $request)
    {
        return view('point-of-sales.pos-create-menu');
    }

    public function category(Request $request)
    {
        $data = [
            'categories' => [
                [
                    'id_category' => 'id1',
                    'category_name' => 'Mie',
                    'item_stock' => '0',
                ],

                [
                    'id_category' => 'id2',
                    'category_name' => 'Bubur',
                    'item_stock' => '0',

                ],
            ]
        ];

        return view('point-of-sales.pos-category', $data);
    }

    public function createCategory(Request $request)
    {
        return view('point-of-sales.pos-create-category');
    }
}

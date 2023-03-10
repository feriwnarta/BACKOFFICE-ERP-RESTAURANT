<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function summary(Request $request) {
        return view('inventory.inventory-summary');
    }

    public function stockOpname(Request $request) {
        return view('inventory.inventory-stock-opname');
    }
}

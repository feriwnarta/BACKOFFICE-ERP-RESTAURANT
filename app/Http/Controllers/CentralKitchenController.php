<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CentralKitchenController extends Controller
{
    public function stock(Request $request) {
        return view('central-kitchen.central-kitchen-stock');
    }
}

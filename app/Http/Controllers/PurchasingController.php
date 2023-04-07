<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchasingController extends Controller
{
    public function supplier(Request $request) {
        return view('purchasing.purchasing-supplier');
    }

    public function purchaseOrder(Request $request) {
        return view('purchasing.purchasing-purchase-order');
    }

    public function createPo(Request $request) {
        return view('purchasing.purchasing-create-po');
    }
}

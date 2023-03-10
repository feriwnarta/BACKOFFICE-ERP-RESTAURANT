<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    public function library(Request $request) {
        return view('ingredients.ingredients-library');
    }

    public function category(Request $request) {
        return view('ingredients.ingredients-category');
    }

    public function recipes(Request $request) {
        return view('ingredients.ingredients-recipes');
    }
}

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

    public function createIngredients(Request $request) {
        return view('ingredients.create-ingredients');
    }

    public function createCategory(Request $request) {
        return view('ingredients.create-category');
    }

    public function createRecipes(Request $request) {
        return view('ingredients.create-recipes');
    }
}

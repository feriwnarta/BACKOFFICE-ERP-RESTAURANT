<?php

namespace App\Http\Controllers;

use App\Models\ingredientsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IngredientsController extends Controller
{
    public function library(Request $request)
    {
        $data = [
            //   'ingredients_library' => [

            //   ]
        ];
        return view('ingredients.ingredients-library', $data);
    }

    public function category(Request $request)
    {
        return view('ingredients.ingredients-category');
    }

    public function recipes(Request $request)
    {
        return view('ingredients.ingredients-recipes');
    }

    public function createIngredients(Request $request)
    {
        //        Get Katergori from category_ingredients;
        $categories = DB::table("category_ingredients")->select("uuid_category", "category_name")->get(true)->toArray();
        foreach ($categories as $category) {
            $datas[] = [
                "category" => $category->category_name,
                "uuidCategory" => $category->uuid_category
            ];
        }
        //        var_dump($datas);
        return view('ingredients.create-ingredients', compact("datas"));
    }

    public function createCategory(Request $request)
    {
        return view('ingredients.create-category');
    }
    public function storeCategory(Request $request)
    {
        $categoryName = $_POST['categoryName'];
        $created_by = "Admin";
        $data = [
            "categoryName" => $categoryName,
            "createdBy" => $created_by
        ];
        $storeCategory = new ingredientsModel();
        $result = $storeCategory->storeCategory($data);
        echo $result;
    }

    public function createRecipes(Request $request)
    {
        return view('ingredients.create-recipes');
    }

    public function semiFinishedRecipes(Request $request)
    {
        return view('ingredients.semi-finished-recipes');
    }

    public function createSemiFinishedRecipes(Request $request)
    {
        return view('ingredients.create-semi-finished-recipes');
    }
}

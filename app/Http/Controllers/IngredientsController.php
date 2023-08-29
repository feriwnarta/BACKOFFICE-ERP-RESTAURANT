<?php

namespace App\Http\Controllers;

use App\Models\ingredientsModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class IngredientsController extends Controller
{

    public function getAllIngredients()
    {
        $results = DB::table('ingredient')->get();
        foreach ($results as $result) {
            $datas[] = [
                "uuidIngredient" => $result->uuid_ingredient,
                "name_ingredient" => $result->name_ingredient,
                "category_ingredient" => $result->category_ingredient,
                "minimum_stock" => $result->minimum_stock,
                "unit" => $result->name_ingredient,
            ];
            return $datas;
        }
    }

    public function getIngredient()
    {
        $idIngredient = $_POST['idIngredient'];
        $results = DB::table('ingredient')
            ->where('uuid_ingredient', '=', $idIngredient)
            ->get()
            ->toArray();
        foreach ($results as $result) {
            $data = [
                "idIngredient" => $result->uuid_ingredient,
                "nameIngredient" => $result->name_ingredient,
                "unitIngredient" => $result->unit,
            ];
        }

        return $data;
    }
    public function library(Request $request)
    {
        $results = DB::table('ingredient')
            ->select('ingredient.uuid_ingredient', 'ingredient.name_ingredient', 'category_ingredients.category_name as category_ingredient', 'ingredient.minimum_stock', 'ingredient.unit')
            ->join('category_ingredients', 'ingredient.category_ingredient', '=', 'category_ingredients.uuid_category')
            ->get()
            ->toArray();
        $count = DB::table('ingredient')->get()->count();
        if ($count > 0) {

            foreach ($results as $result) {
                //            $data = [
                //                   'ingredients_library' => [
                //                        "uuid_ingredient"=>$result->uuid_ingredient,
                //                        "name_ingredient"=>$result->name_ingredient,
                //                        "category_ingredient"=>$result->category_ingredient,
                //                        "minimum_stock"=>$result->minimum_stock,
                //                        "unit_ingredient"=>$result->unit,
                //                   ]
                //            ];
                $datas[] = [

                    "uuid_ingredient" => $result->uuid_ingredient,
                    "name_ingredient" => $result->name_ingredient,
                    "category_ingredient" => $result->category_ingredient,
                    "minimum_stock" => $result->minimum_stock,
                    "unit_ingredient" => $result->unit,

                ];
            }
        } else {
            $datas[] = null;
        }

        return view('ingredients.ingredients-library', compact('datas'));
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
        $count = DB::table("category_ingredients")->select("uuid_category", "category_name")->get(true)->count();
        if ($count == 0) {
            $datas[] = [
                "category" => "",
                "uuidCategory" => ""
            ];
        }
        foreach ($categories as $category) {
            $datas[] = [
                "category" => $category->category_name,
                "uuidCategory" => $category->uuid_category
            ];
        }

        return view('ingredients.create-ingredients', compact("datas"));
    }

    public function storeIngredients(Request $request)
    {
        $uuid = Str::uuid();
        $itemName = $_POST['itemName'];
        $category = $_POST['category'];
        $qty = $_POST['quantity'];
        $unit = $_POST['unit'];
        // var_dump("testing");
        try {
            $result =  DB::table('ingredient')->insert([
                "uuid_ingredient" => $uuid,
                "category_ingredient" => $category,
                "name_ingredient" => $itemName,
                "minimum_stock" => $qty,
                "unit" => $unit,
            ]);
            echo $result;
        } catch (QueryException $e) {
            echo $e->getMessage();
        }
        // $result = DB::table('ingredient')->insert([
        //     "uuid_ingredient" => $uuid,
        //     "category_ingredient" => $category,
        //     "name_ingredient" => $itemName,
        //     "minimum_stock" => $qty,
        //     "unit" => $unit,
        // ]);

        // echo $result;
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

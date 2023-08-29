<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PosController extends Controller
{
    public function menu(Request $request)
    {
        return view('point-of-sales.pos-menu');
    }

    public function createMenu(Request $request)
    {
        $getCategories = DB::table("category_pos")->select("uuid_category_pos", "category_name")->get();
        $categories = [];
        foreach ($getCategories as $category) {

            $categories[] = [
                "idCategory" => $category->uuid_category_pos,
                "categoryName" => ucwords($category->category_name),
            ];
        }


        return view('point-of-sales.pos-create-menu', compact("categories"));
    }

    public function submitMenu(Request $request)
    {
        $id_menu = Str::uuid();
        $id_category = $request->input("idCategory");
        $menu_name = $request->input("menuName");
        $pricing = $request->input("pricing");
        $in_stock = $request->input("inStock");
        $min_stock = $request->input("minStock");
        $date = new DateTime();
        $created_at = $date->format("Y-m-d");
        $update_at = $date->format("Y-m-d");

        $datas = [
            "uuid_menu_pos" => $id_menu,
            "uuid_category" => $id_category,
            "menu_name" => $menu_name,
            "pricing" => $pricing,
            "in_stock" => $in_stock,
            "min_stock" => $min_stock,
            "created_at" => $created_at,
            "updated_at" => $update_at,
        ];

        $result = DB::table('menu_pos')->insert($datas);
    }

    public function category(Request $request)
    {

        $categories = DB::table('category_pos')
            ->select('category_pos.category_name', 'category_pos.uuid_category_pos', DB::raw('COUNT(menu_pos.menu_name) as total_items'))
            ->leftjoin('menu_pos', 'category_pos.uuid_category_pos', '=', 'menu_pos.uuid_category')
            ->groupBy('category_pos.category_name', 'category_pos.uuid_category_pos')
            ->get();

        if ($categories->count() <= 0) {
            $datas = [];
        }
        $datas = [];
        foreach ($categories as $category) {
            $datas[] = [
                "id_category" => $category->uuid_category_pos,
                "category_name" => ucwords($category->category_name),
                "item_stocks" => $category->total_items
            ];
        }

        return view('point-of-sales.pos-category', compact("datas"));
    }

    public function createCategory(Request $request)
    {
        return view('point-of-sales.pos-create-category');
    }
    public function submitCategory(Request $request)
    {
        $id_category = Str::uuid();
        $category = $request->input("categoryName");


        $data = [
            "uuid_category_pos" => $id_category,
            "category_name" => $category,

        ];
        try {
            $result = DB::table('category_pos')->insert($data);
            return 1;
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        }
    }
}

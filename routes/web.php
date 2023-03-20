<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::get('test1', function () {
    return 'test1';
});

// Routes Untuk Menu POS
Route::controller(\App\Http\Controllers\PosController::class)->group(function () {
    Route::get('pos/menu', 'menu');
    Route::get('pos/category', 'category');
});

// Routes Untuk Menu Ingredients
Route::controller(\App\Http\Controllers\IngredientsController::class)->group(function () {
    Route::get('ingredients/library', 'library');
    Route::get('ingredients/category', 'category');
    Route::get('ingredients/recipes', 'recipes');
});

// Routes Untuk Menu inventory
Route::controller(\App\Http\Controllers\InventoryController::class)->group(function () {
    Route::get('inventory/summary', 'summary');
    Route::get('inventory/stock-opname', 'stockOpname');
    Route::get('inventory/stock-opname', 'stockOpname');
});

// Routes Untuk Menu Central Kitchen
Route::controller(\App\Http\Controllers\CentralKitchenController::class)->group(function () {
   Route::get('central-kitchen/stock', 'stock');
});

// Routes Untuk Menu Purchasing
Route::controller(\App\Http\Controllers\PurchasingController::class)->group(function () {
   Route::get('purchasing/supplier', 'supplier');
    Route::get('purchasing/purchase-order', 'purchaseOrder');
});



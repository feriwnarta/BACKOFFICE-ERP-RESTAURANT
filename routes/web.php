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

Route::get('test2', function () {
    return view('point-of-sales.point-of-sales');
});

Route::get('test3', function () {
    return 'test3';
});

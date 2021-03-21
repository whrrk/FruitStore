<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

Route::get('/', function () {
    return view('store');
});

Route::get('/get_kind_info', 'StoreController@get_kind_info');
Route::get('/get_price_info', 'StoreController@get_price_info');

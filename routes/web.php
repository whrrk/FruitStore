<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

Route::get('/', function () {
    return view('postypeStore');
});

Route::get('/get_kind_info', 'PostypeController@get_kind_info');
Route::get('/get_price_info', 'PostypeController@get_price_info');

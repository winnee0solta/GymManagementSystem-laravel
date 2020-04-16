<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Create Initial Admin Account
Route::get('/bxi87623iuy/new-admin/{username}/{password}', 'AuthController@createAdmin');

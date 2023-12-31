<?php

use App\Http\Controllers\API\homeApi;
use App\Http\Controllers\API\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('home',homeApi::class);

Route::get('product',[homeApi::class,'products']);

Route::get('users',[homeApi::class,'useres']);


Route::get('archive',[homeApi::class,'archive']);
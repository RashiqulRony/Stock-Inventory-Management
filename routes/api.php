<?php

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

Route::get('/', function () {
    echo 'worked!';
});

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::post('refresh-token', 'AuthController@refreshToken');

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::post('me', 'AuthController@me');
    Route::post('logout', 'AuthController@logout');

    Route::post('profile-update', 'CommonController@profileUpdate');
    Route::post('change-password', 'CommonController@changePassword');

    Route::apiResource('category', 'CategoryController');
    Route::apiResource('subcategory', 'SubcategoryController');
    Route::apiResource('brand', 'BrandController');

});

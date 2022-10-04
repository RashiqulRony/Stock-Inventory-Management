<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth::routes();
// User Domain Route
Route::domain('{account}.{domain}.{local}')->group(function(){
    Route::get( '/{vue_route?}', 'DomainController@index')->where( 'vue_route', '(.*)' );
});

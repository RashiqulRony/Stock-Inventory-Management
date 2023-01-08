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


# User Domain Route...
Route::domain('{account}.{domain}.{local}')->group(function(){
    Route::get( '/{vue_route?}', 'DomainController@index')->where( 'vue_route', '(.*)' );
});

# Website Routes...
Route::group(['namespace' => 'Website', 'as' => 'web.'], function () {
    Route::get('/', 'WebController@home')->name('home');
    Route::get('about', 'WebController@about')->name('about');
    Route::get('service', 'WebController@service')->name('service');
    Route::get('pricing', 'WebController@pricing')->name('pricing');
    Route::get('blog', 'WebController@blog')->name('blog');
    Route::get('contact', 'WebController@contact')->name('contact');
    Route::get('register', 'WebController@register')->name('register');
    Route::post('register-user', 'WebController@userRegister')->name('userRegister');
});


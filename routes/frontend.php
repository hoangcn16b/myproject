<?php

use App\Http\Controllers\Admin\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get(
//     '/',
//     [App\Http\Controllers\Admin\HomeController::class, 'home']
// )->name('home');

$prefixFrontend = 'cake';

Route::group(['prefix' => $prefixFrontend, 'namespace' => 'App\Http\Controllers\Frontend'], function () {
    // ============================== HOME ==============================
    $prefix         = '';
    $controllerName = 'home';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/', ['as' => 'home/frontend', 'uses' => 'HomeController@' . 'home']);
    });

    // ============================== user ==============================
    $prefix         = '';
    $controllerName = 'user';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/user/login', ['as' => 'user/login', 'uses' => 'UserController@' . 'login']);
        Route::get('/user/register', ['as' => 'user/register', 'uses' => 'UserController@' . 'register']);
    });

    // ============================== cart ==============================
    $prefix         = '';
    $controllerName = 'cart';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/cart/index', ['as' => 'cart/index', 'uses' => 'CartController@' . 'index']);
        Route::get('/cart/checkout', ['as' => 'cart/checkout', 'uses' => 'CartController@' . 'checkout']);
        Route::get('/cart/confirm-order', ['as' => 'cart/confirmOrder', 'uses' => 'CartController@' . 'confirmOrder']);
    });

    $prefix         = '';
    $controllerName = 'product';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/product/detail/{id?}', ['as' => 'product/detail', 'uses' => 'ProductController@' . 'detail']);
        
    });
});

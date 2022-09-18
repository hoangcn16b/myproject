<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\Admin\Status;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Frontend\HomeController;
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

$prefix         = 'admin';
$controllerName = 'auth';
Route::group(['prefix' =>  $prefix, 'namespace' => 'App\Http\Controllers\Admin'], function () use ($controllerName) {
    $controller = ucfirst($controllerName)  . 'Controller@';
    Route::get('/login',        ['as' => $controllerName . '/login',      'uses' => $controller . 'login']);
    Route::post('/postLogin',   ['as' => $controllerName . '/postLogin',  'uses' => $controller . 'postLogin']);
});

$prefixBackend = 'admin';
Route::group(['prefix' => $prefixBackend, 'middleware' => 'admin.login'], function () {
    Route::get('/logout',       ['as' => 'auth/logout',     'uses' => 'App\Http\Controllers\Admin\AuthController@logout']);

    // ============================== HOME ==============================
    $prefix         = '';
    $controllerName = 'admin';
    Route::group(['prefix' =>  $prefix, 'namespace' => 'App\Http\Controllers\Admin'], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/dashboard', ['as' => 'admin/dashboard', 'uses' => 'HomeController@' . 'home']);
    });

    // ============================== profile ==============================
    $controllerName = 'account';
    Route::group(['prefix' =>  $prefix, 'namespace' => 'App\Http\Controllers\Admin'], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/account/index', ['as' => 'admin/account/index', 'uses' => $controller . 'index']);
        Route::post('/account/edit', ['as' => 'admin/account/edit', 'uses' => $controller . 'edit']);
    });

    // ============================== slider ==============================
    $controllerName = 'slider';
    Route::group(['prefix' =>  $prefix, 'namespace' => 'App\Http\Controllers\Admin'], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/slider/index', ['as' => $controllerName . '/index', 'uses' => $controller . 'index']);
        Route::get('/slider/form', ['as' => $controllerName . '/formAdd', 'uses' => $controller . 'formAdd']);
        Route::post('/slider/store', ['as' => $controllerName . '/store', 'uses' => $controller . 'store']);

        Route::get('/slider/create', ['as' => $controllerName . '/create', 'uses' => $controller . 'create']);
        Route::post('/slider/edit', ['as' => $controllerName . '/edit', 'uses' => $controller . 'edit']);

        Route::get('/slider/status', ['as' => 'status/edit', 'uses' => 'App\Http\Livewire\Admin\Status@edit']);
    });

    // ============================== category ==============================
    $controllerName = 'category';
    Route::group(['prefix' =>  $prefix, 'namespace' => 'App\Http\Controllers\Admin'], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/category/index', ['as' => 'admin/' . $controllerName . '/index', 'uses' => $controller . 'index']);
        Route::get('/category/form', ['as' => 'admin/' . $controllerName . '/form', 'uses' => $controller . 'formAdd']);
        Route::post('/category/store', ['as' => 'admin/' . $controllerName . '/store', 'uses' => $controller . 'store']);

        Route::get('/category/create', ['as' => 'admin/' . $controllerName . '/create', 'uses' => $controller . 'create']);
        Route::post('/category/edit', ['as' => 'admin/' . $controllerName . '/edit', 'uses' => $controller . 'edit']);
        Route::post('/category/delete', ['as' => 'admin/' . $controllerName . '/delete', 'uses' => $controller . 'delete']);

        Route::get('/category/status', ['as' => 'admin/status/edit', 'uses' => $controller . 'edit']);
        Route::get('/category/change-ordering/{ordering?}-{id?}', ['as' => 'admin/category/ordering', 'uses' => $controller . 'ordering']);
        Route::get('/category/change-ordering/{ordering?}-{id?}', ['as' => 'admin/category/ordering', 'uses' => $controller . 'ordering']);
    });
});

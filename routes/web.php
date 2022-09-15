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
    $controllerName = 'home';
    Route::group(['prefix' =>  $prefix, 'namespace' => 'App\Http\Controllers\Admin'], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/dashboard', ['as' => 'home/backend', 'uses' => 'HomeController@' . 'home']);
    });

    // ============================== profile ==============================
    $controllerName = 'account';
    Route::group(['prefix' =>  $prefix, 'namespace' => 'App\Http\Controllers\Admin'], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/account/index', ['as' => 'account/index', 'uses' => $controller . 'index']);
        Route::post('/account/edit', ['as' => 'account/edit', 'uses' => $controller . 'edit']);
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
});

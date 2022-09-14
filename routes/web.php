<?php

use App\Http\Controllers\Admin\HomeController;
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
        Route::get('/', ['as' => 'home/backend', 'uses' => 'HomeController@' . 'home']);
    });

    // ============================== profile ==============================
    $controllerName = 'account';
    Route::group(['prefix' =>  $prefix, 'namespace' => 'App\Http\Controllers\Admin'], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/account/profile-index', ['as' => 'account/profile-index', 'uses' => $controller . 'index']);
        Route::post('/account/profile-edit', ['as' => 'account/profile-edit', 'uses' => $controller . 'edit']);
    });
});

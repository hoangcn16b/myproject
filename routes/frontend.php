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


});

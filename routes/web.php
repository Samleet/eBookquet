<?php

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

Route::prefix('/')
    ->name('frontend.')
    ->group(function(){

    require_once('web/frontend.php') ?? exit();

});

Route::prefix('/publisher')
    ->name('publisher.')
    ->group(function(){

    require_once('web/publisher.php') ?? exit();

});
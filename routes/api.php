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


//Publishers
Route::prefix('/publisher')
    ->name('publisher.')
    ->group(function(){

    require_once('api/publisher.php') ?? exit();

});

//Users
Route::prefix('/account')
    ->name('account.')
    ->group(function(){

    require_once('api/user.php'/* */) ?? exit();

});

//Service
Route::prefix('/service')
    ->name('service.')
    ->group(function(){

    require_once('api/service.php') ?? exit();

});

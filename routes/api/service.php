<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(ServiceController::class)->group(function(){
    Route::any('/{action?}/{id?}', 'index')->name('index');
});

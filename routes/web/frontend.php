<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::namespace('FrontEnd')->group(function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/about-us', 'about')->name('about');
        Route::get('/knetmart', 'knetmart')->name('knetmart');
        Route::get('/faq', 'faq')->name('faq');
        Route::get('/bookhuts', 'bookhuts')->name('bookhuts');
        Route::get('/contacts', 'contacts')->name('contacts');
        Route::get('/terms-and-condition', 'terms')->name('terms');
        Route::get('/privacy', 'privacy')->name('privacy');
        
    });
});

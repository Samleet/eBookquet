<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::namespace('Publisher')->group(function(){
    Route::controller(OauthController::class)->group(function(){
        Route::prefix('/login')->name('login.')->group(function(){
            Route::post('/', 'login')->name('auth');
        });
        Route::post('/register', 'register')->name('register');
        Route::get('/logout', 'logout')->name('logout');

        Route::middleware(['auth:publisher'])->group(function () {
            Route::prefix('/profile')->name('profile.')->group(function(){
                Route::post('/', 'update')->name('update');
            });            
        });
    });

    Route::middleware(['auth:publisher'])->group(function () {
        Route::controller(HomeController::class)->group(function(){

            Route::get('/dashboard', 'index')->name('dashboard');

        });

        Route::controller(WalletController::class)->group(function(){
            Route::prefix('/wallet')->name('wallet.')->group(function(){
                Route::get('/', 'index')->name('index');
            });                
        });

        Route::controller(BookController::class)->group(function(){
            Route::prefix('/books')->name('books.')->group(function(){
                Route::get('/', 'index')->name('index');

                Route::prefix('/create')->name('create.')->group(function(){
                    Route::get('/', 'showCreate')->name('form');
                    Route::post('/', 'create')->name('create');
                });

                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::get('/', 'showEdit')->name('edit');
                    Route::put('/', 'update')->name('update');
                    Route::get('/delete', 'delete')->name('delete');
                });
            });                
        });

        Route::controller(GenreController::class)->group(function(){
            Route::prefix('/genres')->name('genres.')->group(function(){
                Route::get('/', 'index')->name('index');

                Route::prefix('/create')->name('create.')->group(function(){
                    Route::get('/', 'showCreate')->name('form');
                    Route::post('/', 'create')->name('create');
                });

                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::get('/', 'showEdit')->name('edit');
                    Route::put('/', 'update')->name('update');
                    Route::get('/delete', 'delete')->name('delete');
                });
            });                
        });

        Route::controller(RentalController::class)->group(function(){
            Route::prefix('/rentals')->name('rentals.')->group(function(){
                Route::get('/', 'index')->name('index');
            });                
        });
    });

});

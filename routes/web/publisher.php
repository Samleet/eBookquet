<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::namespace('FrontEnd\Publisher')->group(function(){
    Route::controller(OauthController::class)->group(function(){
        Route::prefix('/login')->name('login.')->group(function(){
            Route::get('/', 'showLogin')->name('index');
            Route::post('/', 'login')->name('auth');
        });
        Route::prefix('/register')->name('register.')->group(function(){
            Route::get('/', 'showRegister')->name('index');
            Route::post('/', 'register')->name('auth');
        });
        Route::get('/logout', 'logout')->name('logout');

        Route::middleware(['publisher'])->group(function () {
            Route::prefix('/profile')->name('profile.')->group(function(){
                Route::get('/{page?}', 'profile')->name('index');
                Route::post('/{page?}', 'update')->name('update');
            });
            Route::post('/notification', 'alert')->name('alert');
        });
    });

    Route::middleware(['publisher'])->group(function () {
        Route::controller(HomeController::class)->group(function(){

            Route::get('/dashboard', 'index')->name('dashboard');

        });

        Route::controller(WalletController::class)->group(function(){
            Route::prefix('/wallet')->name('wallet.')->group(function(){
                Route::get('/', 'index')->name('index');
            });                
        });

        Route::controller(BookController::class)->group(function(){
            Route::prefix('/bookstore')->name('books.')->group(function(){
                Route::get('/', 'index')->name('index');

                Route::prefix('/create')->name('create.')->group(function(){
                    Route::get('/', 'showCreate')->name('form');
                    Route::post('/', 'create')->name('create');
                });

                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::get('/', 'showEdit')->name('edit');
                    Route::post('/', 'update')->name('update');
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
                    Route::post('/', 'update')->name('update');
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

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::prefix('account')->name('account.')->group(function(){
    Route::controller(OauthController::class)->group(function(){
        Route::prefix('/login')->name('login.')->group(function(){
            Route::post('/', 'login')->name('auth');
            Route::post('/pin', 'pinLogin')->name('pin');
        });
        Route::prefix('/register')->name('register.')->group(function(){
            Route::post('/', 'register')->name('profile');
            Route::post('/bookhut', 'bookhut')->name('bookhut');
        });
        Route::get('/logout', 'logout')->name('logout');

        Route::middleware(['auth:api'])->group(function () {
            Route::prefix('/profile')->name('profile.')->group(function(){
                Route::post('/', 'update')->name('update');
            });
            Route::prefix('/settings')->name('settings.')->group(function(){
                Route::post('/', 'settings')->name('index');
            });
            Route::post('/notification', 'alert')->name('alert');
        });
    });

    Route::middleware(['auth:api'])->group(function () {
        Route::controller(SearchController::class)->group(function(){
            Route::prefix('/search')->name('search.')->group(function(){
                Route::get('/', 'index')->name('index');
            });
        });

        Route::controller(WalletController::class)->group(function(){
            Route::prefix('/wallet')->name('wallet.')->group(function(){
                Route::get('/', 'index')->name('index');
            });                
        });

        Route::controller(BookqueController::class)->group(function(){
            Route::prefix('/bookquet')->name('bookquet.')->group(function(){
                Route::get('/', 'index')->name('index');
                Route::get('/latest', 'latest')->name('latest');
                Route::get('/featured', 'featured')->name('featured');
                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::get('/', 'show')->name('index');
                });
            });
        });

        Route::controller(BookhutController::class)->group(function(){
            Route::prefix('/bookhut')->name('bookhut.')->group(function(){
                Route::get('/', 'index')->name('index');
            });
        });

        Route::controller(ChatController::class)->group(function(){
            $parent = '/bookhut/hutchat';

            Route::prefix($parent)->name('shelf.')->group(function(){
                Route::get('/', 'index')->name('index');
                Route::post('/', 'create')->name('create');
            });
        });

        Route::controller(ShelfController::class)->group(function(){
            $parent = '/bookhut/shelf';

            Route::prefix($parent)->name('shelf.')->group(function(){
                Route::get('/', 'index')->name('index');
                Route::post('/', 'create')->name('create');

                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::get('/', 'show')->name('index');
                    Route::put('/', 'update')->name('update');
                    Route::delete('/', 'delete')->name('delete');
                });
            });
        });

        Route::controller(LibraryController::class)->group(function(){
            $parent = '/bookhut/library';

            Route::prefix($parent)->name('library.')->group(function(){
                Route::get('/', 'index')->name('index');
                Route::post('/', 'create')->name('create');
                
                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::get('/', 'show')->name('index');
                    Route::put('/', 'update')->name('update');
                    Route::delete('/', 'delete')->name('delete');
                });
            });
        });

        Route::controller(HuttalkController::class)->group(function(){
            $parent = '/bookhut/huttalk';

            Route::prefix($parent)->name('huttalk.')->group(function(){
                Route::get('/', 'index')->name('index');
                Route::post('/', 'create')->name('create');
                
                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::get('/', 'show')->name('index');
                    Route::put('/', 'update')->name('update');
                    Route::delete('/', 'delete')->name('delete');
                });
            });
        });

        Route::controller(WishlistController::class)->group(function(){
            Route::prefix('/wishlist')->name('wishlist.')->group(function(){
                Route::get('/', 'index')->name('index');
                Route::post('/', 'fav')->name('create');
                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::delete('/', 'delete')->name('delete');
                });
            });
        });

        Route::controller(NotecardController::class)->group(function(){
            $route = '/rock/notecard';
            Route::prefix($route)->name('notecard.')->group(function(){                
                Route::get('/', 'index')->name('index');
                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::get('/', 'show')->name('index');
                    Route::post('/', 'create')->name('create');
                    Route::put('/', 'update')->name('update');
                    Route::delete('/', 'delete')->name('delete');
                });
            });
        });

        Route::controller(NotepadController::class)->group(function(){
            $route = '/rock/notepad';
            Route::prefix($route)->name('notepad.')->group(function(){                
                Route::get('/', 'index')->name('index');
                Route::post('/', 'create')->name('create');
                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::get('/', 'show')->name('index');
                    Route::put('/', 'update')->name('update');
                    Route::delete('/', 'delete')->name('delete');
                });
            });
        });

        Route::controller(VocalController::class)->group(function(){
            $route = '/rock/vocals';
            Route::prefix($route)->name('vocals.')->group(function(){                
                Route::get('/', 'index')->name('index');
                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::get('/', 'show')->name('index');
                    Route::post('/', 'create')->name('create');
                    Route::put('/', 'update')->name('update');
                    Route::delete('/', 'delete')->name('delete');
                });
            });
        });

        Route::controller(PostcardController::class)->group(function(){
            $route = '/rock/postcard';
            Route::prefix($route)->name('postcard.')->group(function(){                
                Route::get('/', 'index')->name('index');
                Route::prefix('/{id}')->name('show.')->group(function(){
                    Route::get('/', 'show')->name('index');
                    Route::post('/', 'create')->name('create');
                    Route::put('/', 'update')->name('update');
                    Route::delete('/', 'delete')->name('delete');
                });
            });
        });

     });
// });

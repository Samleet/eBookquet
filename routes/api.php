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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('service')->name('service.')->group(function(){
    Route::controller(ServiceController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/create', 'create')->name('create');
    });
});

Route::prefix('account')->name('account.')->group(function(){
    Route::controller(OauthController::class)->group(function(){
        Route::prefix('/login')->name('login.')->group(function(){
            Route::post('/', 'login')->name('auth');
            Route::post('/pin', 'pinLogin')->name('pin');
        });
        Route::post('/register', 'register')->name('register');
        Route::get('/logout', 'logout')->name('logout');

        //middleware
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
        //Bookquet
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
            Route::prefix('/bookhut')->name('bookquet.')->group(function(){
                Route::get('/', 'index')->name('index');
                Route::get('/trending', 'trending')->name('trending');
                Route::get('/top', 'top')->name('top');
                Route::prefix('/{id}')->name('show')->group(function(){
                    Route::get('/', 'show')->name('show');
                    Route::post('/join', 'join')->name('join');
                    Route::post('/request', 'request')->name('request');

                    Route::prefix('/member/{user}')->group(function(){
                        Route::get('/', 'member')->name('member');
                        Route::post('/', 'manage')->name('manage');
                    });

                    Route::prefix('/space/{spaceId}')->group(function(){
                        Route::get('/', 'space')->name('space');
                    });

                    Route::prefix('/comments')->name('chat.')->group(function(){
                        Route::get('/', 'comments');
                        Route::post('/', 'postComment');
                    });        
                });
            });
        });

        Route::controller(LibraryController::class)->group(function(){
            Route::prefix('/library')->name('library.')->group(function(){
                Route::get('/', 'index')->name('index');
                Route::get('/all', 'all')->name('all');
                Route::get('/reading', 'reading')->name('reading');
                Route::get('/top', 'top')->name('top');
                Route::get('/recent', 'recent')->name('recent');

                Route::post('/create', 'create')->name('create');
                Route::post('/delete', 'delete')->name('delete');
                Route::prefix('/wishlist')->group(function(){
                    Route::name('wishlist.')->group(function(){
                        Route::get('/', 'wishlist')->name('wishlist');
                        Route::post('/', 'favorite')->name('favorite');
                    });
                });
                Route::get('/{id}', 'show')->name('show');
            });
            Route::prefix('/books/{id}')->name('comment.')->group(function(){
                Route::get('/comments', 'comments');
                Route::post('/comments', 'postComment');
            });
        });

        Route::controller(ClassroomController::class)->group(function(){
            Route::prefix('/classroom')->name('bookquet.')->group(function(){
            });
        });
     });
});

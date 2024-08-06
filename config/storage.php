<?php

return [

    'users' => [
        'photo' => config('app.url').'/storage/profiles',
    ],

    'book' => [
        'store' => config('app.url').'/storage/books',
        'library' => config('app.url').'/storage/library',
    ],

    'uploads' => [
        'library' => config('app.url').'/storage/uploads',
    ],

];

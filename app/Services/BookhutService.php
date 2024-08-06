<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Bookhut;
use App\Models\Group;
use App\Models\User;
use App\Models\Chat;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Enums\Access;
use App\Enums\Message;

class BookhutService {

    public function __construct(){
        //

    }

    public function index($request){
        /*
        $bookshelf = bookhut()->bookshelf()->latest() ->get() ->take(
            $limit
        );
        */
        
        $data = [
            'insight' => [],
        ];

        return [
            'status' => 200,
            'data' => $data
        ];
    }

}
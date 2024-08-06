<?php

namespace App\Services;

use App\Models\Book;
use App\Exceptions\ApplicationException;
use App\Enums\Error;

class WalletService {

    public function __construct(){
        
        //

    }

    public function index($request){
        $wallet = user()->wallet;
        
        return [
            'status' => 200,
            'data' => $wallet
        ];
    }

}

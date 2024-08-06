<?php

namespace App\Services\Publisher;

use App\Services\Publisher\WalletService;
use App\Exceptions\ApplicationException;
use App\Enums\Error;

class HomeService {
        
    public function __construct(){
        
        //////////////////////////////////////////////////////////

    }
    
    public function index($request){
        $user = publisher();
        // (new WalletService)->boot(request());


        $data = [];
        $summary = [
            'books' => $user->books->count(),
            'renters' => 0,
            'genres' => $user->genres->count(),
            'rentals' => 0,
            'toDue' => 0,
        ];
        
        return [
            'status' => 200,
            'data' => [
                'summary' => $summary,
                'data' => $data
            ]
        ];        
    }
    
}
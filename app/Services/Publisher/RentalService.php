<?php

namespace App\Services\Publisher;

use App\Models\Book;
use App\Exceptions\ApplicationException;
use App\Enums\Error;

class RentalService {
        
    public function __construct(){
        
        //////////////////////////////////////////////////////////

    }
    
    public function index($request){
        $data = [];
        $statistics = [
            'today' => 0,
            'total' => 0,
            'month' => 0,
        ];
        
        return [
            'status' => 200,
            'data' => [
                'statistics' => $statistics,
                'data' => $data
            ]
        ];
    }
    
}
<?php

namespace App\Services\Publisher;

use App\Models\Wallet;
use App\Exceptions\ApplicationException;
use App\Enums\Error;

class WalletService {
        
    public function __construct(){
        
        //////////////////////////////////////////////////////////

    }

    public function index($request){
        $data = [];
        $summary = [
            'revenue' => 0,
            'withdraws' => 0,
        ];
        
        return [
            'status' => 200,
            'data' => [
                'summary' => $summary,
                'transactions' => $data
            ]
        ];        
    }
    
}
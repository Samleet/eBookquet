<?php

namespace App\Http\Controllers\FrontEnd\Publisher;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Publisher\WalletController as Service;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public $service;

    public function __construct(Service $service){
        
        /////////////////////////////////////////////////////////

        $this->service = $service;

    }

    public function index(Request $request){
        $wallet = res($this->service->index($request))['data'];
        $tx = $wallet['transactions'];
        $summary = $wallet['summary'];

        return view(
            'publisher.wallet.index'
        )->with([
            'title' => 'Wallet',
            'summary' => $summary,
            'transactions' => $tx
        ]);
    }

}

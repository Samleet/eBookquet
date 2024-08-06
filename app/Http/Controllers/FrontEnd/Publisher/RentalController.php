<?php

namespace App\Http\Controllers\FrontEnd\Publisher;

use App\Http\Controllers\Controller;
use App\Services\Publisher\RentalService;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public $service;

    public function __construct(RentalService $service){
        
        /////////////////////////////////////////////////////////

        $this->service = $service;

    }

    public function index(Request $request){
        $rentals = $this->service->index($request)['data'] ?? [];
        $data = $rentals['data'];
        $statistics = $rentals['statistics'];

        return view(
            'publisher.rentals.index'
        )->with([
            'title' => 'Rentals',
            'statistics' => $statistics,
            'data' => $data,
        ]);
    }

}

<?php

namespace App\Http\Controllers\FrontEnd\Publisher;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Publisher\HomeController as Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $service;

    public function __construct(Service $service){
        
        /////////////////////////////////////////////////////////

        $this->service = $service;

    }

    public function index(Request $request){
        $dashboard = res($this->service->index($request))['data'];
        $data = $dashboard['data'];
        $summary = $dashboard['summary'];


        return view(
            'publisher.dashboard.index'
        )->with([
            'title' => 'Dashboard',
            'summary' => $summary
        ]);
    }

}

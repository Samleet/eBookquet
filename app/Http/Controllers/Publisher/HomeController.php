<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Services\Publisher\HomeService;
use Illuminate\Http\Request;
use App\Exceptions\ApplicationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(HomeService $service){
        
        $this->service = $service;

    }

    /**
     * @param Request $Request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function index(Request $request){
        
        return response()->json($this->service->index($request));

    }

}

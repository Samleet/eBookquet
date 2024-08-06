<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Services\Publisher\WalletService;
use Illuminate\Http\Request;
use App\Exceptions\ApplicationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(WalletService $service){
        
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

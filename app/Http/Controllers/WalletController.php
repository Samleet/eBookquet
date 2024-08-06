<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WalletService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(WalletService $WalletService){

        $this->service = $WalletService;

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

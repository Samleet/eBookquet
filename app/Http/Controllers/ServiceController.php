<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GlobalService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;


class ServiceController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(GlobalService $GlobalService){

        $this->service = $GlobalService;

    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function index(Request $request){

        return response()->json($this->service->index($request));

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatService;
use App\Http\Resources\ChatResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(ChatService $ChatService){
        
        $this->service = $ChatService;
    }

    /**
     * @param Request $request
     * @return ChatResource
     * @throws ApplicationException
     */
    public function index(Request $request){

        return response()->json($this->service->index($request));

    }

    /**
     * @param Request $request
     * @return ChatResource
     * @throws ApplicationException
     */
    public function create(Request $request){

        return response()->json($this->service->create($request));

    }

}

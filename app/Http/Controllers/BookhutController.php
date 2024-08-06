<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookhutService;
use App\Http\Resources\BookhutResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class BookhutController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(BookhutService $BookhutService){
        
        $this->service = $BookhutService;
    }

    /**
     * @param Request $request
     * @return BookhutResource
     * @throws ApplicationException
     */
    public function index(Request $request){

        return response()->json($this->service->index($request));

    }

}

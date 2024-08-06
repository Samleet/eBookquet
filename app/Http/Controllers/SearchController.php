<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(SearchService $SearchService){

        $this->service = $SearchService;

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

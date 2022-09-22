<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookqueService;
use App\Http\Resources\BookqueResource;
use App\Http\Resources\BookResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class BookqueController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(BookqueService $BookqueService){

        $this->service = $BookqueService;

    }

    /**
     * @param Request $request
     * @return BookqueResource
     * @throws ApplicationException
     */
    public function index(Request $request){

        return response()->json($this->service->index($request));

    }

    /**
     * @param Request $request
     * @return BookqueResource
     * @throws ApplicationException
     */
    public function show(Request $request){

        return response()->json($this->service->show($request));

    }

    /**
     * @param Request $request
     * @return BookResource
     * @throws ApplicationException
     */
    public function featured(Request $request){

        return response()->json($this->service->featured($request));
        
    }

    /**
     * @param Request $request
     * @return BookResource
     * @throws ApplicationException
     */
    public function latest(Request $request){

        return response()->json($this->service->latest($request));
        
    }
}

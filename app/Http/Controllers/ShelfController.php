<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShelfService;
use App\Http\Resources\ShelfResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ShelfController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(ShelfService $ShelfService){

        $this->service = $ShelfService;

    }

    /**
     * @param Request $request
     * @return ShelfService
     * @throws ApplicationException
     */
    public function index(Request $request){

        return response()->json($this->service->index($request));

    }

    /**
     * @param Request $request
     * @return ShelfService
     * @throws ApplicationException
     */
    public function create(Request $request){

        return response()->json($this->service->create($request));

    }

    /**
     * @param Request $request
     * @return ShelfService
     * @throws ApplicationException
     */
    public function show(Request $request){

        return response()->json($this->service->show($request));
        
    }

    /**
     * @param Request $request
     * @return ShelfService
     * @throws ApplicationException
     */
    public function update(Request $request){

        return response()->json($this->service->update($request));
        
    }

    /**
     * @param Request $request
     * @return ShelfService
     * @throws ApplicationException
     */
    public function delete(Request $request){

        return response()->json($this->service->delete($request));

    }

}

<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Services\Publisher\GenreService;
use Illuminate\Http\Request;
use App\Exceptions\ApplicationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class GenreController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(GenreService $service){
        
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

    /**
     * @param Request $Request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function create(Request $request){
        
        return response()->json($this->service->create($request));

    }

    /**
     * @param Request $Request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function show(Request $request){
        
        return response()->json($this->service->show($request));

    }

    /**
     * @param Request $Request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function update(Request $request){
        
        return response()->json($this->service->update($request));

    }

    /**
     * @param Request $Request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function delete(Request $request){
        
        return response()->json($this->service->delete($request));

    }

}

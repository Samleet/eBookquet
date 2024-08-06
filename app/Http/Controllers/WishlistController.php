<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WishlistService;
use App\Http\Resources\WishlistResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(WishlistService $WishlistService){

        $this->service = $WishlistService;

    }

    /**
     * @param Request $request
     * @return WishlistResource
     * @throws ApplicationException
     */
    public function index(Request $request){

        return response()->json($this->service->index($request));

    }

    /**
     * @param Request $request
     * @return WishlistResource
     * @throws ApplicationException
     */
    public function fav(Request $request){

        return response()->json($this->service->fav($request));

    }

    /**
     * @param Request $request
     * @return WishlistResource
     * @throws ApplicationException
     */
    public function delete(Request $request){

        return response()->json($this->service->delete($request));

    }

}

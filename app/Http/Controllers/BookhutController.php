<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookhutService;
use App\Http\Resources\BookhutResource;
use App\Http\Resources\BookResource;
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

    /**
     * @param Request $request
     * @return BookhutResource
     * @throws ApplicationException
     */
    public function show(Request $request){

        return response()->json($this->service->show($request));

    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function join(Request $request){

        return response()->json($this->service->join($request));

    }

    /**
     * @param Request $request
     * @return BookHutResource
     * @throws ApplicationException
     */
    public function member(Request $request){

        return response()->json($this->service->member($request));
        
    }

    /**
     * @param Request $request
     * @return BookHutResource
     * @throws ApplicationException
     */
    public function manage(Request $request){

        return response()->json($this->service->manage($request));
        
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function request(Request $request){

        return response()->json($this->service->request($request));

    }

    /**
     * @param Request $request
     * @return BookHutResource
     * @throws ApplicationException
     */
    public function top(Request $request){

        return response()->json($this->service->top($request));
        
    }
    
    /**
     * @param Request $request
     * @return BookHutResource
     * @throws ApplicationException
     */
    public function trending(Request $request){

        return response()->json($this->service->trending($request));
        
    }

    /**
     * @param Request $request
     * @return BookHutResource
     * @throws ApplicationException
     */
    public function space(Request $request){

        return response()->json($this->service->space($request));
        
    }

    /**
     * @param Request $request
     * @return BookHutResource
     * @throws ApplicationException
     */
    public function comments(Request $request){

        return response()->json($this->service->comments($request));
        
    }

    /**
     * @param Request $request
     * @return BookHutResource
     * @throws ApplicationException
     */
    public function postComment(Request $request){

        return response()->json($this->service->postComment($request));
        
    }

}

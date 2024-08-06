<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotepadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class NotepadController extends Controller
{
    /**
     * @var service
     */
    private $service;

    public function __construct(NotepadService $NotepadService){

        $this->service = $NotepadService;

    }

    /**
     * @param Request $request
     * @return LibraryResource
     * @throws ApplicationException
     */
    public function index(Request $request){

        return response()->json($this->service->index($request));

    }

    /**
     * @param Request $request
     * @return LibraryResource
     * @throws ApplicationException
     */
    public function show(Request $request){

        return response()->json($this->service->show($request));

    }

    /**
     * @param Request $request
     * @return LibraryResource
     * @throws ApplicationException
     */
    public function create(Request $request){

        return response()->json($this->service->create($request));

    }

    /**
     * @param Request $request
     * @return LibraryResource
     * @throws ApplicationException
     */
    public function update(Request $request){

        return response()->json($this->service->update($request));

    }

    /**
     * @param Request $request
     * @return LibraryResource
     * @throws ApplicationException
     */
    public function delete(Request $request){

        return response()->json($this->service->delete($request));

    }

}

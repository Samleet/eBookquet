<?php

namespace App\Http\Controllers\FrontEnd\Publisher;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Publisher\GenreController as Service;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public $service;

    public function __construct(Service $service){
        
        /////////////////////////////////////////////////////////

        $this->service = $service;

    }

    public function index(Request $request){
        $genres = res($this->service->index($request))['data'];
        // return $genres['data'];

        return view(
            'publisher.genre.index'
        )->with([
            'title' => 'Genres',
            'genres' => $genres['data']
        ]);
    }

    public function showCreate(Request $request){
        return view(
            'publisher.genre.create'
        )->with([
            'title' => 'Genres'
        ]);
    }

    public function create(Request $request){
        try {
            
            $create = res($this->service->create($request));

            return success(
                $create);

        } catch(\Throwable $e){

            return error($e);

        }
    }

    public function showEdit(Request $request){
        try {
            
            $genre = res($this->service->show($request))['data'];

        } catch(\Throwable $e){

            return error($e);

        }

        return view(
            'publisher.genre.show'
        )->with([
            'title' => 'Genres',
            'genre' => $genre
        ]);
    }

    public function update(Request $request){
        try {
            
            $update = res($this->service->update($request));

            return success(
                $update);

        } catch(\Throwable $e){

            return error($e);

        }
    }

    public function delete(Request $request){
        try {
            
            $delete = res($this->service->delete($request));

            return success(
                $delete);

        } catch(\Throwable $e){

            return error($e);

        }
    }

}

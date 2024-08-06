<?php

namespace App\Http\Controllers\FrontEnd\Publisher;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Publisher\BookController as Service;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public $service;

    public function __construct(Service $service){
        
        /////////////////////////////////////////////////////////

        $this->service = $service;

    }

    public function index(Request $request){
        $books = res($this->service->index($request))['data'];
        $data = $books['data']['data'];
        $statistics = $books['statistics'];

        return view(
            'publisher.books.index'
        )->with([
            'title' => 'Books',
            'statistics' => $statistics,
            'books' => $data,
        ]);
    }

    public function showCreate(Request $request){
        $genres = publisher()->genres; //fetch publisher genre

        return view(
            'publisher.books.create'
        )->with([
            'title' => 'Books',
            'genres' => $genres,
        ]);
    }

    public function create(Request $request){
        try {
            
            $create = res($this->service->create($request));

            return redirect()->to(
                '/publisher/bookstore'
            )->with([
                'status' => 'success',
                'message' => $create['message']
            ]);

        } catch(\Throwable $e){

            return error($e);

        }
    }

    public function showEdit(Request $request){
        $genres = publisher()->genres; //fetch publisher genre

        try {
            
            $book = res($this->service->show($request))['data'];

        } catch(\Throwable $e){

            return error($e);

        }

        return view(
            'publisher.books.show'
        )->with([
            'title' => $book['title'],
            'book' => $book,
            'genres' => $genres,
        ]);
    }

    public function update(Request $request){
        try {
            
            $update = res($this->service->update($request));

            return redirect()->to(
                '/publisher/bookstore'
            )->with([
                'status' => 'success',
                'message' => $update['message']
            ]);

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

<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Bookquet;
use App\Models\Bookhut;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Enums\Access;

class BookqueService {

    public function __construct(){
        //

    }

    public function index($request){
        $bookque = Bookquet::where('access', '!=', null)->orderBy('id', 'DESC')
        ->get();

        $data = [];

        foreach($bookque as $bookq){
            $data[] = $bookq->load('books', 'bookhuts', 'members');
        }

        return [
            'data' => $data
        ];
    }

    public function show($request){
        $bookque = Bookquet::find($request->id);

        if(!$bookque){
            throw new ApplicationException(Error::RESOURCE_NOT_FOUND);
        }

        return [
            'data' => $bookque->load('books', 'bookhuts', 'members')
        ];
    }

    public function featured($request){
        $limit = limit(@$request->limit);
        $bookque = Bookquet::where('access', ( Access::PUBLIC ))->inRandomOrder()
        // ->take($limit)
        ->get();

        $data = [];

        foreach($bookque as $bookquet){
            if($bookquet->owner()){

                //continue;
                
            }

            $data[] = $bookquet->load('books', 'bookhuts', 'members');
        }

        return [
            'data' => array_slice((array) $data, 0, $limit)
        ];
    }

    public function latest($request){
        $groups = user()->groups->load('bookquet','bookhut');
        $limit = limit(@$request->limit);
        $books = [];
        foreach($groups as $group){
            $bookquet = $group->bookquet 
                        ? $group->bookquet->load('books')->books->toArray() : [];
            $bookhut = $group->bookhut 
                        ? $group->bookhut ->load('books')->books->toArray() : [];

            $books = array_merge($books, $bookquet, $bookhut);
        }

        $tmp = [];
        $books = array_filter((array) $books, function($array) use ($tmp) {     #
            if(isset($tmp[$array['title']])){
                return false;
            }
            $tmp[] = $array['title'];
          });

        if(count($books) == 0){
            $books = Book::where('access',Access::PUBLIC)->inRandomOrder ()     #
            ->take($limit)
            ->get ();
        }

        return [
            'data' => array_slice($books->toArray(), 0, $limit) // get collection 
        ];
    }
}
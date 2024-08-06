<?php

namespace App\Services;

use App\Models\Book;
use App\Exceptions\ApplicationException;
use App\Enums\Error;

class WishlistService {

    public function __construct(){
        
        //

    }

    public function index($request){
        $limit = limit(@$request->limit);
        $wishlist = user()->wishlist()->latest()->get()->take($limit);
        $books = [];

        foreach($wishlist as $wish){
            if( $wish->book){
                $books[] = $wish->book;
            }
        }

        return [
            'status' => 200,
            'data' => $books
        ];
    }

    public function fav($request){
        $book = Book::find($request->id);
        $wishlist = user()->wishlist()->where('book_id', $request->id)
        ->first();

        if(!$wishlist){
            $wishlist = user()->wishlist()
                ->create([
                'book_id' => $request->id
            ]);
            
        }
        else{
            $wishlist->delete();

            return [
                'message' => 'Book successfully deleted from wishlist',
                'data' => $book
                    ->fresh()
            ];    
        }

        return [
            'message' => 'You have succesfully added book to wishlist',
            'data' => $book
                ->fresh()
        ];
    }

    public function delete($request){

        return $this->fav($request); /////////////////////////////////

    }

}

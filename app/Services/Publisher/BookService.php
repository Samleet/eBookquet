<?php

namespace App\Services\Publisher;

use App\Models\Book;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use Illuminate\Support\Str;

class BookService {
        
    public function __construct(){
        
        //////////////////////////////////////////////////////////

    }
    
    public function index($request){
        $books = publisher()->books();
        $data = (clone $books)->latest()->paginate( $limit = 50 );

        $genres = publisher()->genres;
        $statistics = [
            'today' => (clone $books)->whereBetween('created_at',[
                carbon()->startOfDay(),
                carbon()->endOfDay(),
            ])->count(),
            'week' => (clone $books)->whereBetween('created_at',[
                carbon()->startOfWeek(),
                carbon()->endOfWeek(),
            ])->count(),
            'month' => (clone $books)->whereBetween('created_at',[
                carbon()->startOfMonth(),
                carbon()->endOfMonth(),
            ])->count(),
        ];
        
        return [
            'status' => 200,
            'data' => [
                'statistics' => $statistics,
                'genres' => $genres,
                'data' => $data
            ]
        ];        
    }

    public function create($request){
        $title = $request->title;
        $author = $request->author;
        $isbn = $request->isbn;
        $genre = $request->genre;
        $type = $request->type;
        $price = $request->price;
        $desc = $request->description;
        $status = $request->status;
        $share = $request
            ->has('share');
        $uuid = Str::lower(
            $uuid = Str::random (10)
        );

        $store = $s = config(
            $x ='storage.book.store'
        );
        $photo = $request
            ->file('photo' ); //////
        $source = $request
            ->file('source'); //////
        
        $format = Str::upper(
            /**/$source->extension()
        );
        
        $book = new Book();
        $book->publisher_id = publisher()->id; ///////////////////
        $book->title = $title;
        $book->author = $author;
        $book->meta = [];
        $book->genre_id = $genre;
        $book->type = $type;
        $book->isbn_code = $isbn;
        $book->price = $price;
        $book->status = $status;
        $book->format = $format;
        $book->description = $desc;
        $book->sharing = $share;
        $book->reference = $uuid;
        $book->save();

        //upload book
        if($source){
            $source->storeAs(
                'books', 
                "{$uuid}.{$source->extension( )}", ///////////////
                'public'
            );
        }

        //upload image
        if($photo ){
            $imgExt = $photo->extension();

            $photo->storeAs(
                'books/thumbnails', 
                "{$uuid}.{$photo ->extension( )}", ///////////////
                'public'
            );

            $book->update([

                'thumbnail' => "{$s}/thumbnails/{$uuid}.{$imgExt}"
            
            ]);    
        }

        return [
            'status' => 200,
            'message' => 'Book successfully uploaded to Bookstore',
            'data' => $book
        ];
    }

    public function show($request){
        $book = publisher()->books( )->find($book = $request->id);

        if(!$book){

            throw 
            new ApplicationException( Error::RESOURCE_NOT_FOUND );

        }

        return [
            'status' => 200,
            'data' => $book
        ];
    }

    public function update($request){
        $book = $this->show($request)['data']; ///////////////////
        $copy = $book;

        $title = $request->title;
        $author = $request->author;
        $isbn = $request->isbn;
        $genre = $request->genre;
        $type = $request->type;
        $price = $request->price;
        $desc = $request->description;
        $status = $request->status;
        $share = $request
            ->has('share');
        $uuid = $book->reference;

        $store = $s = config(
            $x ='storage.book.store'
        );
        $photo = $request
            ->file('photo' ); //////

        $source = $request
            ->file('source'); //////
        
        if($source)
        $format = Str::upper(
            /**/$source->extension()
        );
        
        $book->update([
            'title' => $title,
            'author' => $author,
            'genre_id' => $genre,
            'type' => $type,
            'isbn_code' => $isbn,
            'price' => $price,
            'status' => $status,
            'format' => $format 
                ?? $book->format,
            'description' => $desc,
            'sharing' => $share,
        ]);

        //upload book
        if($source){
            $gtDoc = $copy->book;
            $gtDoc = substr($gtDoc, strpos($gtDoc, ('storage')));            
            @unlink($gtDoc);

            $source->storeAs(
                'books', 
                "{$uuid}.{$source->extension( )}", ///////////////
                'public'
            );
        }

        //upload image
        if($photo ){
            $imgExt = $photo->extension();

            $thumb = $copy->thumbnail;
            $thumb = substr($thumb, strpos($thumb, ('storage')));            
            @unlink($thumb);

            $photo->storeAs(
                'books/thumbnails', 
                "{$uuid}.{$photo ->extension( )}", ///////////////
                'public'
            );

            $book->update([

                'thumbnail' => "{$s}/thumbnails/{$uuid}.{$imgExt}"
            
            ]);
        }

        return [
            'status' => 200,
            'message' => 'Book successfully updated in Bookstore',
            'data' => $book
        ];
    }

    public function delete($request){
        $book = $this->show($request)['data']; ///////////////////
        $book->delete();

        return [
            'status' => 200,
            'message' => 'Book successfully deleted in Bookstore',
        ];
    }

}
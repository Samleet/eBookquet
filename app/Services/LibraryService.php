<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Bookquet;
use App\Models\Bookhut;
use App\Models\Library;
use App\Models\User;
use App\Models\Comment;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Enums\Access;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LibraryService {

    public function __construct(){
        
        //

    }

    public function index($request){
        $limit = limit(@$request->limit);
        $library = bookhut()->library(); //////////////////////////////
        $data = [
            'insight' => [],
            'reading' => [],
            'completed' => [],
        ];

        $reading =   (clone $library)->where($arg = ['completed' => 0])
            ->latest('updated_at')
            ->get();
        $completed = (clone $library)->where($arg = ['completed' => 1])
            ->get();
        
        
        foreach($reading as $book){
            
            $data['reading'][] = $book->book; //fetch the book model

        }

        foreach($completed as $book){
            
            $data['completed'][] = $book->book; //fetch the book model

        }
        
        return [
            'status' => 200,
            'data' => $data
        ];
    }

    public function create($request){
        $book = Book::findOrFail($request->book_id);
        $shelf = $request->shelf_id;
        $signature = user()->ref();

        //TODO:
        //check rental limit


        //check if in bookshelf
        $library = bookhut()->library()->where('book_id','=',$book->id)
            ->first();
        if($library){
            
            throw new ApplicationException(Error::RESOURCE_IS_OWNED );
            
        }

        //bootstrap user storage
        File::ensureDirectoryExists("storage/library/".( $signature ));

        //copy- book from source
        if(!Storage::disk('public')->exists(
            "library/$signature/".$book->storage()) // book not in disk
        ){
            Storage::disk('public')->copy(
                "books/".$book->storage(),
                "library/$signature/".$book->storage()
            );
        };

        //create link in library
        $library = new Library();
        $library->bookhut_id = bookhut()->id;
        $library->bookshelf_id = $shelf;
        $library->book_id = $book->id;
        $library->save();

        return [
            'status' => 200,
            'message' => "You've successfully added a book to library",
            'data' => $library->fresh()
        ];
    }

    public function show($request){
        $library = bookhut()->library()->where('book_id',$request->id)
            ->first();
        $tmpData = $library->toArray();

        if(!$library) 
            return;

        $library->touch();

        return [
            'status' => 200,
            'data' => $library
        ];
    }

    public function update($request){
        $library = $this->show($request)['data']; ////////////////////
        $book = $library->book;
        $reqIgnore = [
            'statistics'
        ];
        $statistics = $request
            ->statistics;
        $totalPages = $statistics[
            'pages'
        ];
        $currentPage = $request
            ->current_page;
        $isCompleted = $currentPage 
            >= $totalPages;


        if(!$library) 
            return;

        $library->update($request->except(
            $reqIgnore
        ));

        if($statistics){
            /*
            $statistics = $request->statistics;
            $data = json_decode($library->statistics ?? '{}', true );
            $currentPage = $statistics['page'];

            unset($statistics['page']);

            $data[
                $currentPage
            ] = $statistics;

            $library->update([
                'statistics' => json_encode($data) //updating book data
            ]);
            */
            
        }

        if($isCompleted){
            $library->update([

                'completed' => $isCompleted //////////////////////////
                
            ]);
        }
    }

    public function delete($request){
        $library = $this->show($request)['data']; ////////////////////
        $book = $library->book;
        $signature = user()->ref();
        
        //remove book resource
        Storage::disk('public')
            ->delete(
            "library/$signature/".$book->storage()
        );

        //delete assoc relation
        $library->cards()->delete();
        $library->vocals()->delete();
        $library->posts()->delete();

        $library->delete();

        return [
            'status' => 200,
            'message' => "Book was successfully deleted from library",
        ];
    }

}
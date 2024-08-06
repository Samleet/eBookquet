<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Bookquet;
use App\Models\Bookhut;
use App\Models\Library;
use App\Models\Space;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Enums\Access;

class SearchService {

    public function __construct(){
        //

    }

    public function index($request){
        $query = $request->input('query'); ////////////////////////////////////
        $results = [
            'bookquet' => [], 'bookhut' => [], 'library' => [], 'books' => [],
            'spaces' => [],
        ];

        $bookquet = Bookquet::whereNotNull('id')
        ->with('bookhuts')
        ->where('name', 'like', "%$query%")
        ->orWhere('interest', 'like', "%$query%")
        ->orWhere('org_name', 'like', "%$query%")
        ->take(50)->get();

        $bookhuts = Bookhut::whereNotNull('id')
        ->where('name', 'like', "%$query%")
        ->orWhere('description', 'like', "%$query%")
        ->take(50)->get();

        $library = Library::whereNotNull('id')
        ->where('user_id', '=', user()->id)
        ->whereIn('book_id', Book::where('title', 'like', "%$query%")->get( )
        ->pluck('id'))
        ->take(50)->get();

        $reads = [];
        foreach($library as $data){
            $find = Book::find(@ $data->book_id );
            if( $find){
                $library =  $data->toArray();
                $library['resource'] = $data->url();
                $book = $data->load('book')->book;
                $book['reading'] = $library;
                $reads[] = $book; //////////////////////////////////////////
            }
        }

        $books = Book::whereNotNull('id')
        ->where('title', 'like', "%$query%")
        ->orWhere('description', 'like', "%$query%")
        ->take(50)->get();

        $spaces = Space::whereNotNull('id')
        ->where('title', 'like', "%$query%")
        ->orWhere('schedule',    'like', "%$query%")
        ->take(50)->get();

        $huttalk = [];
        foreach($spaces as $space){
            if($space->status != 'started'){
                continue;
            }
            $space->members = $space->members(null);
            $huttalk[] = $space;
        }

        $results['bookquet'] = $bookquet;
        $results['bookhut'] = $bookhuts;
        $results['books'] = $books;
        $results['library'] = $reads;
        $results['spaces'] = $huttalk ;

        ////////////////////////////////////////////////////////////////////

        return [
            'data' => $results, ////////////////////////////////////////////
        ];        
    }
}

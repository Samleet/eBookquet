<?php

namespace App\Services;

use App\Models\Genre;
use App\Models\Book;
use App\Models\User;
use App\Models\Comment;
use App\Enums\Book as BookType;
use App\Models\Directory;
use App\Models\Publisher;
use App\Services\BookService;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use Illuminate\Support\Facades\Storage;
use App\Enums\Bookquet;

class GlobalService {

    public function __construct(){

        //////////////////////////////////////////////////////////////

    }

    public function index($request){
        $service = $request->action;

        if($service){
            if(method_exists($this, $service) == true) { //load module
                return $this->{$service}(
                    $request
                );
            }

            throw new ApplicationException(Error::SERVICE_UNAVAILABLE);

        }
    }

    public function genre($request){
        $id = $request->id;
        $genre = Genre::all();

        if($id)
        $genre = Genre::with('books')
            ->where('id', (int)$id)->orWhere('name', '=', (string)$id)
            ->firstOrFail()
            ->books;

        return [
            'status' => 200,
            'data' => $genre
        ];
    }

    public function book($request){
        $req = $request->req;
        $sch = $request->method();

        $bookService = (new BookService($request->id)); // bookService
        $book = $bookService->get();
        $data = $book;

        try {
            $data = /**/ $bookService->$req(); //load resource cluster

        } catch (\Throwable $e){
            // dd($e);
            
        }

        return [
            'status' => 200,
            'data' => $data
        ];
    }

    public function library($request){
        $type = $request->type;
        $genres = Genre::inRandomOrder()
            ->take(10)
            ->get();
        
        $books = Book::query()->where('type',$type)->whereNotNull('id')
            ->active();
        $latest = (clone $books)
            ->latest()
            ->take(10)
            ->get();

        $suggest = (clone $books)
            ->withCount('rentals')
            ->latest('rentals_count')
            ->take(10)
            ->get();

        $featured = (clone $books)
            ->whereNotIn(
                'id', 
                $type == 'FREE' ? [] :
                $suggest->pluck('id')
            )
            ->inRandomOrder()
            ->take(10)
            ->get();

        $publishers = Publisher::query()
        ->where([
            'verified' => 1
        ])
        ->with([
            'books' => function($query) {
            $query->withCount('rentals');
        }])
        ->get()
        /*
        ->filter(function($publisher) {
            return $publisher->books
            ->sum('rentals_count') > 0;
        })
        */
        ->sortByDesc(function($publisher) {
            return $publisher->books
            ->sum('rentals_count');
        });

        return [
            'status' => 200,
            'data' => [
                'publishers' => $publishers,
                'genres' => $genres,
                'books' => [
                    'latest' => $latest,
                    'suggested' => $suggest,
                    'featured' => $featured
                ],
            ]
        ];
    }

    public function publisher($request){
        $id = $request->id;
        $publisher = Publisher::query()->with('books')->find((int)$id);
        $books = $publisher->books;
        $latest = [];
        $oneWeek = 604800;

        foreach($books as $book){
            $date = carbon()->parse(
                $book->created_at
            )->timestamp;

            if(time() - $date < $oneWeek){
                $latest[] = $book;
            }
        }
        
        $publisher->books = $books;
        $publisher->latest = $latest;

        return [
            'status' => 200,
            'data' => $publisher
        ];
    }

    public function categories($request){
        $data = [];
        $is = $request->method();
        $directory = [
            
            Bookquet::SOCIAL, Bookquet::EDUCATIONAL//getting directory

        ];

        foreach($directory as $dir){
            $getDirData = Directory::where('bookquet', $dir)->first();
            $name = strtolower($dir);
            $tmp = Storage::disk('public')
                ->get($getDirData->data);
            $data[$name] = json_decode($tmp);
        }

        //handle selection
        if($is == 'POST'){
            $interest = $request->interest;
            if(!$interest){
                
                throw new ApplicationException(Error::MISSING_FIELDS);

            }

            /*
            user()->interests()->create([
                'data' => json_encode(
                    $interest
                )
            ]);
            */
            $data = $interest;
        }

        return [
            'data' => $data
        ];

        //////////////////////////////////////////////////////////////

    }

}
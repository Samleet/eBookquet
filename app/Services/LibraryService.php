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
        $library = user()->library()->orderBy('id', 'DESC')->get()
        ->take($limit);
        $books = [];

        foreach($library as $data){
            if( $data->book){
                $books[] = $data->book; //fetch books not yet completed
            }
        }

        return [
            'data' => $books
        ];
    }

    public function create($request){
        $book = Book::find($request->id);
        $signature = user()->signature();

        if(!$book){
            throw new ApplicationException(Error::RESOURCE_NOT_FOUND);
        }

        //check if in my library
        $lib = user()->library()->where('book_id', $book->id)->first();
        if($lib){
            throw new ApplicationException(Error::RESOURCE_IS_OWNED );  
        }

        //bootstrap user storage
        File::ensureDirectoryExists("storage/library/".( $signature ));

        //copy  book from source
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
        $library->user_id = user()->id;
        $library->book_id = $book->id;
        $library->save();

        return [
            'message' => "You've successfully added book to bookshelf",
            'data' => $library
        ];
    }

    public function delete($request){
        $type = $request->type;
        $book = user()->library()->where('book_id', $request->id)->first(
            //
        );

        if($type == 'wishlist'){
            $id = $request->id;
            $book = user()->wishlist()->where('book_id', $id)->first(
                //
            );
        }

        if(!$book){
            throw new ApplicationException(Error::RESOURCE_NOT_FOUND);
        }

        if($type == 'library' ){
            $book->notes()->delete();
        }
        
        $book->delete();

        return [
            'message' => "You've successfully deleted book from shelf",
        ];
    }

    public function show($request){
        $library = user()->library()->where('book_id','=',$request->id)
        ->first();
        $library->touch();

        return [
            'data' => $library->book
        ];
    }

    public function reading($request){
        $limit = limit(@$request->limit);
        $library = user()->library->take($limit);
        $books = [];

        foreach($library as $book){
            if(!$book->completed){
                $books[] = $book->book; //fetch books not yet completed
            }
        }

        shuffle($books);

        return [
            'data' => $books
        ];
    }

    public function all($request){
        $limit = limit(@$request->limit);
        $library = Book::inRandomOrder()->take($limit)->get();

        return [
            'data' => $library
        ];
    }

    public function recent($request){
        $limit = limit(@$request->limit);
        $library = user()->library()->orderBy('updated_at', 'DESC')
        ->get()
        ->take($limit);
        $books = [];

        foreach($library as $data){
            if( $data->book){
                $books[] = $data->book; //fetch books not yet completed
            }
        }

        return [
            'data' => $books
        ];
    }

    public function top($request){
        $limit = limit(@$request->limit);
        $library = Book::join(
            'libraries', 'libraries.book_id', '=', 'books.id'
        )
        ->select('books.*')
        ->withCount('libraries')
        ->groupBy('books.id')
        ->orderBy('libraries_count', 'DESC')
        ->take($limit)
        ->get();

        return [
            'data' => $library
        ];
    }

    public function wishlist($request){
        $limit = limit(@$request->limit);
        $wishlist = user()->wishlist()->orderBy('id', 'DESC')->get()
        ->take($limit);
        $books = [];

        foreach($wishlist as $book){
            if( $book->book){
                $books[] = $book->book; //fetch books not yet completed
            }
        }

        return [
            'data' => $books
        ];
    }

    public function favorite($request){
        $wishlist = user()->wishlist()->where('book_id', $request->id)
        ->first();

        if(!$wishlist){
            $wishlist = user()->wishlist()->create([
                'book_id' => $request->id
            ]);
        }
        else{
            $wishlist->delete();

            return [
                'message' => 'Book successfully deleted from wishlist',
                'data' => $wishlist
            ];    
        }

        return [
            'message' => 'You have succesfully added book to wishlist',
            'data' => $wishlist
        ];
    }

    public function comments($request){
        $book = Book::findOrFail($request->id)->load('comments');
        $comments = [];

        foreach($book->comments as $comment){
            $user = User::find($comment->user_id);
            $reply = null;

            if($comment->reply_to){
                $reply = $reference = Comment::find($comment->reply_to);
                if($reply){
                    $user = User::find(
                        $reply->user_id
                    );
                    $reply->user = 
                    $user->id == user()->id ? 'Me' : $user->fullname;

                    $reply->message = substr($reply->message, 0, 60)   .
                    (true && strlen($reply->message)>60? '...' : '')   ;
                }
            }

            if(!$user) continue;

            $comments[] = [
                'id' => $comment->id,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->fullname
                ],
                'message' => $comment->message,
                'date' => $comment->created_at,
                'highlight' => $comment->highlight,  // significant tags
                'reply' => $reply ?? null
            ];
        }

        return [
            'data' => $comments
        ];
    }

    public function postComment($request){
        $book = Book::findOrFail($request->id)->load('comments');

        $comment = $book->comments()->create([
            'user_id' => user()->id,
            'book_id' => $book->id,
            'message' => $request->message,
            'reply_to' => $request->reply
        ]);

        return [
            'message' => 'You have succesfully posted a new comment. ',
            'data' => $comment
        ];
        
        ////////////////////////////////////////////////////////////////
    }
}
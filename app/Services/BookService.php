<?php

namespace App\Services;

use App\Models\Book;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use Illuminate\Support\Str;

class BookService {
    
    private $book;

    public function __construct($id){
        $book = Book::query()->where('id', $id)->orWhere('title', $id)
            ->orWhere('isbn_code', $id)
            ->active()
            ->firstOrFail();

        $this->book = $book;
    }

    public function get($key = null){

        return $key ? 
        $this->book->$key : $this->book;

    }

    public function discuss(){
        $comments = [];

        foreach($this->book->comments as $comment){
            $user = $comment->user;
            $reply = null;

            if(!$user) continue;

            if($comment->reply_to){
                $reply = $comment->reply;
                $owner = $user->id == user()->id;
                $replyTo = $reply->user;
                $ellip = strlen(
                    $reply->message) > 60 ? '...'
                : '';

                $reply = [
                    'id' => $reply->id,
                    'user' => $owner ? 'Me' : $user->fullname,
                    'message' => substr(
                        $reply->message, 0, 60
                    ).$ellip
                ];
            }

            $comments[] = array_merge([
                'id' => $comment->id,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->fullname
                ],
                'message' => $comment->message,
                'date' => $comment->created_at,
                'highlight' => $comment->highlight, //significant tags
            ], !$reply ? [] : [
                'reply' => $reply
            ]);
        }

        return $comments;

    }

    public function comment(){
        $book = $this->book;
        $comment = $book->comments()
            ->create([
            'user_id' => user()->id,
            'book_id' => $book->id,
            'message' => request()->message, /////////////////////////
            'reply_to' => request()->reply
    
        ])->fresh();

        return $comment;

    }

}

<?php

namespace App\Services;

use App\Jobs\Hutchat;
use App\Exceptions\ApplicationException;
use App\Enums\Error;

class ChatService {

    public function __construct(){
        //

    }

    public function index($request){
        $chats = [];
        $hutchats = bookhut()->hutchats()->orderBy('id','ASC')->get();

        foreach($hutchats as $chat){
            $user = $chat->user;
            $reply = null;

            if(!$user) continue;

            if($chat->reply_to){
                $reply = $chat->reply;
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

            $chats[] = array_merge([
                'id' => $chat->id,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->fullname
                ],
                'message' => $chat->message,
                'date' => $chat->created_at, /////////////////////////
            ], !$reply ? [] : [
                'reply' => $reply
            ]);
        }
        
        return [
            'status' => 200,
            'data' => $chats
        ];
    }

    public function create($request){
        $hutchat = bookhut()->hutchats();

        $chat = $hutchat->create([
            'user_id' => user()->id,
            'message' => request()->message, /////////////////////////
            'reply_to' => request()->reply
    
        ])->fresh();

        Hutchat::dispatch($chat);

        return [
            'status' => 200,
            'data' => $this->index($request) /////////////////////////
        ];
    }

}
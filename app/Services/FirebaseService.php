<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Illuminate\Support\Str;

class FirebaseService 
{
    protected $factory;
    protected $messaging;
    protected $database;

    public function __construct(){        
        $factory = $init = ( new Factory )->withServiceAccount(
            $credentials = config(
                'firebase.projects.app.credentials.file'
            )
        )->withDatabaseUri(
            config(
                'firebase.projects.app.database.url'
            )
        );

        $this->messaging = $factory->createMessaging();
        $this->database = $factory->createDatabase();
        $this->factory = $factory;
    }

    public function database(string $table){

        $this->database = $this->database->getReference($table);

        return $this;

    }

    public function create(array $records){
        $token = Str::lower(
            Str::random(10)
        );

        $create = $this->database->getChild($id = $token)->set(
            $payload = $records
        );

        return $create->getKey();

    }

    public function get(string $id = null){

        if(!$id){

            return $snapshot = $this -> database -> getValue();

        }

        $snapshot = $this->database->getSnapshot();

        if($snapshot->hasChild($id)){
            return json_decode(
                json_encode($snapshot->getChild($id)->getValue())
            );
        }
        
        return;

    }

    public function update(string $id, array $data){

        $snapshot = $this->database->getSnapshot();
        
        if($this->get($id)){
            foreach($data as $key => $value){
                $find = $snapshot->getChild($id)->hasChildren(
                    $key
                );

                if($find){
                    $this->database->getChild($id)->update([
                        $key => $value
                    ]);
                    return true;
                }
            }
        }
        
        return;

    }

    public function delete(string $id){

        if($this->get($id)){

            $delete = $this->database->getChild($id)->remove();

            return true;

        }

        return;
        
    }

    public function sendNotification($request){
        /*
        $notification = Notification::fromArray($payloads = [
            'title' => $request['title'],
            'body' => $request['message'],
            'image' => $request['image'] ?? null,
        ]);

        $message = CloudMessage::withTarget('topic','signal');
        $message = $notification = $message->withNotification(
            $notification
        )->withData(
            @(array)$request['data'] ?? [   ]
        );
        */

        $target = array_key_first( $request );
        if(!in_array(
            $target, array ('topic', 'token'))
        )
            return ;
            
        
        $message = CloudMessage::fromArray($parameter = array(
            $target => $request[$target],
            'notification' => [
                'title' => @$request['title'],
                'body'  => @$request['message'],
                'image' => @$request['image'],
            ], 
            'data' => array_merge ([
                'click_action' => 'FLUTTER_NOTIFICATION_CLICK'
                ],
                $request['data']??[]
            )
        ));

        try {

            $send = $this->messaging->send((object)$message);

        }
        catch (\Throwable $e){

            //tracing error callback ////////////////////////

        }
    }

}
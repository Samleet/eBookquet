<?php

namespace App\Enums;

abstract class Message
{
    const WELCOME = 'Welcome to eBookquet! We are more than glad to have you with us. Enjoy access to instants books, bookhuts and more.';
    const BOOKHUT_REQUEST = 'You have a new join request from :user on Bookhut: :bookhut';
    const BOOKHUT_APPROVE = 'Congrats! Your join request to Bookhut: :bookhut has been successfuly approved. Welcome to the Hut';
    const BOOKHUT_DECLINE = 'We\'re sorry, Your join request to Bookhut: :bookhut was declined by the Hut admins';



    

    public static function build(String $message, $data = []){        
        $raw = preg_match_all("/:(\w)+/", $message, $arguments);
        $map = $arguments[0];

        foreach($map as $val){
            $key = substr($val, 1);

            if(@$data[$key] != null){
                $key = $data[$key];

                $message = str_replace($val, $key, trim($message));
            }
        }

        return $message;
    }
}
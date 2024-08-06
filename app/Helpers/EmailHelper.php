<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class EmailHelper {

    static function verify(string $email){
        $client = new client();

        try {    
            $request = $client->get(
                "https://api.trumail.io/v2/lookups/json?email=$email", [
                "headers" => [
                    "Authorization" => "Bearer apiKey_".substr(md5(uniqid()), 0, 50),
                    "Content-Type" => "application/json"
                ]
            ]);
            $response = json_decode(
                $request->getBody()->getContents(), true
            );
            if(isset(
                   $response ['deliverable'] )
            ){
                return 1;
            }
            return 0;

        } catch (GuzzleException $exception) {
            return $exception->getMessage( ) ;
        }
    }
}
<?php

namespace App\Contracts;

use App\Helpers\EmailHelper;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailContract
{
    protected $user = null;
    
    public function __construct()
    {
        //
    }

    public static function send(string $template, array $data = []){

        if(!EmailHelper::verify($data['email']) == 0){
            return;
        }

        $m = Mail::send('emails.'.$template, $data, 
                                     function($message) use ($data){

            $message->from(env('MAIL_FROM_ADDRESS'), $site = config(
                'app.name')
            );
            $message->to($data['email'] ??null);
            $message->subject($data['subject']);
        });

        ////////////////////////////////////////////////////////////

    }

}
?>
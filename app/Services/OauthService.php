<?php

namespace App\Services;

use App\Models\User;
use App\Models\Setting;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Enums\Message;

class OauthService {

    private $jwtAuth;
    
    public function __construct(JWTAuth $jwtAuth){
        
        $this->jwtAuth = $jwtAuth;

    }
    
    public function login($request){
        $token = auth()->attempt(
            $request->only("email", "password") // authorize login request
        );

        if(!$token){
            throw new ApplicationException(Error::BAD_CREDENTIALS);
        }
        
        $user = array_merge((array)auth()->user()->toArray(), [
            'settings' => 
                Setting::prepare(auth()->user())
            
        ]);

        return [
            'access_token' => $token,
            "token_type" => 'bearer',
            "expires_in" => auth()->guard('api')->factory()->getTTL() * 60,
            "data" => $user
        ];
    }

    public function pinLogin($request){
       $user = auth()->user()->where('pin_code', $request->pin_code)
       ->first();

        if(!$user){
            throw new ApplicationException(Error::WRONG_PIN);
        }

        return [
            'status' => '200',
            'message' => 'Login successful!, redirecting to Dashboard' ,
        ];
    }

    public function register($request){
        $register = User::create($request->all());

        if($register){
            $register->photo = $register->image();

            $register->password = \Hash::make($request->password);
            $register->update();

            /*
            $register->update([
                'password' => \Hash::make($reqreuest->password)
            ]);
            */

            //TODO:
            $register->settings()->create(   array(
                'key' => 'pin_login',
                'value' => 'true'
            ));

            $register->notifications()->create([
                'message' => Message::build(Message::WELCOME, array( ))
            ]);

            //Token
            $token = auth()->attempt(
                $request->only("email", "password")
            );

            $register->access_token = $token;
        }

        return [
            'status' => '200',
            'message' => 'Signup successful!, redirecting to PIN Setup' ,
            'data' => $register
        ];
    }

    public function update($request){
        $profile = auth()->user()->update($request->all());

        if($request->password){
            $profile->password = \Hash::make($request->password);
            $profile->update();
        }
    
        return [
            'status' => '200',
            'message' => 'Profile successfully updated! redirecting ...',
        ];
    }

    public function alert($request){
        $notification = user()->notifications()->where('id', $request->id)
        ->first();

        if(!$notification){
            return;
        }

        $notification->update([
            'seen' => 1
        ]);

        return [
            'status' => '200',
            'message' => 'Notification successfully flagged as approved.',
        ];
    }

    public function logout($request){

        if(auth()->check()){

            $logout = auth()->guard()->logout(); // logout from jwt session
            
        }
    }
}
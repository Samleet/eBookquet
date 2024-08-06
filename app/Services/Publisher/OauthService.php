<?php

namespace App\Services\Publisher;

use App\Models\Publisher;
use App\Models\Wallet;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Enums\Message;
use Illuminate\Support\Str;

class OauthService {

    private $jwtAuth;
    
    public function __construct(JWTAuth $jwtAuth){
        
        $this->jwtAuth = $jwtAuth;

    }
    
    public function login($request){
        $token = auth()
            ->guard('publisher')->attempt($request->only( $credentials = [
                'email',
                'password'
            ])
        );

        if(!$token){
            throw new ApplicationException(Error::BAD_CREDENTIALS);
        }
        
        return [
            'access_token' => $token,
            "token_type" => 'bearer',
            "expires_in" => auth()->guard('api')->factory()->getTTL() * 60,
            "data" => user('publisher')
        ];
    }

    public function register($request){
        $register = Publisher::create($request->all());

        if($register){
            $register->photo = $register->image();
            $register->password = \Hash::make($request->password);
            $register->update();

            Wallet::issue($register);

            $token = auth()->guard(
                'publisher'
            )->attempt(
                $request->only("email", "password")
            );

            $register->access_token = $token;
        }

        return [
            'status' => 200,
            'message' => 'Signup successful!, welcome to eBookquet',
            'data' => $register
        ];
    }

    public function update($request){
        $profile = publisher()->update($request->except($whitelist = [
            'photo',
            'password'
        ]));
        $profile = publisher();

        if($request->password){
            $profile->password = \Hash::make($request->password);
            $profile->update();
        }

        if($request->file('photo')){
            $photo = Str::lower(Str::random(10)). ".jpg";
            $request->file('photo')->storeAs('profiles',$photo,'public');

            $formal = basename(publisher()->photo);
            if($formal 
            != 'user.jpg' && is_file("storage/profiles/$formal")==true){

                @unlink("storage/profiles/$formal");

            }

            $update = publisher()->update([
                'photo' => 
                      config('storage.users.photo') .'/'.basename($photo)
            ]);

            if($update){
                return [
                    'status' => 200,
                    'message' => 'Profile photo successfully updated!  ',
                    'user' => user(),
                ];
            }
        }
    
        return [
            'status' => 200,
            'message' => 'Profile successfully updated! redirecting ...',
            'data' => $profile
        ];
    }

    public function logout($request){

        if(auth()->check()){

            $logout = auth()->guard()->logout(); // logout from jwt session
            
        }
    }
}
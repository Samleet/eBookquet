<?php

namespace App\Services;

use App\Models\User;
use App\Models\BookHut;
use App\Models\Setting;
use App\Models\Wallet;
use App\Enums\Custodian;
use App\Jobs\Notification;
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
        $token = auth()->attempt(
            $request->only("email", "password") // authorize login request
        );
        $device = $request
            ->device_id;

        if(!$token){
            throw new ApplicationException(Error::BAD_CREDENTIALS);
        }

        if($device){
            user()->update([
                'device_id' => $device
            ]);
        }
        
        return [
            'access_token' => $token,
            "token_type" => 'bearer',
            "expires_in" => auth()->guard('api')->factory()->getTTL() * 60,
            "data" => user()
        ];
    }

    public function pinLogin($request){
       $user = auth()->user()->where('pin_code', $request->pin_code)
       ->first();

        if(!$user){
            throw new ApplicationException(Error::WRONG_PIN);
        }

        return [
            'status' => 200,
            'message' => 'Login successful!, redirecting to Dashboard' ,
        ];
    }

    public function register($request){
        $register = User::create($request->all());

        if($register){
            $register->photo = $register->image();
            $register->password = \Hash::make($request->password);
            $register->update();

            $register->settings()->create(array(
                'key' => 'pin_login',
                'value' => true
            ));
            $register->notifications()->create([
                'message' => Message::build(Message::WELCOME, array( ))
            ]);

            Wallet::issue($register);

            $token = auth()->attempt(
                $request->only("email", "password")
            );
            $register->access_token = $token;
        }

        return [
            'status' => 200,
            'message' => 'Signup successful!, redirecting to PIN Setup' ,
            'data' => $register
                ->fresh()
        ];
    }

    public function bookhut($request){
        $user = $request->user;
        $custodian = $request->custodian;
        $bookhut = $request->bookhut;
        $interests = $request->interests;
        $selfCus = true;
        $reference = rand(11111,99999);

        $user = User::where('email', $bookhut['email'])->firstOrFail();

        //get custodian
        if(isset($custodian['id'])){
            $id = $custodian['id'];
            $selfCus = false;

            $custodian = User::query()
            ->where([
                'email' => $id
            ])
            ->orWhereHas('bookhut', /*** **/ function($query) use($id){
                $query->where('code', $id);
            })
            ->first();

            if(!$custodian || $custodian->id 
                == $user->id){
                throw 
                new ApplicationException(
                    Error::NO_CUSTODIAN
                );
            }
        }

        $bookhut = $user->bookhut()->create([
            'code' => $reference,
            'name' => $bookhut['name'],
            'tagline' => $bookhut['tagline'],
            'logo' => asset(
                '/storage/uploads/ebookquet.jpg'
            ),
            'type' => $selfCus 
                ? Custodian::CUSTODIAN 
                : Custodian::MENTORED,
            'interests' => $interests
        ]);

        $join = $bookhut->hutmates()->create([
            'approved' => 1,
            'user_id' => $user->id,
        ]);

        if(!$selfCus){
            $custodian->custodians()->create([
                
                'bookhut_id' => $bookhut
                    ->id

            ]);

            Notification::dispatch($custodian, [
                'channel' => 'push',
                'title' => Message::BOOKHUT,
                'message' => Message::build(Message::BOOKHUT_MESSAGE, [
                    'user' => $user->fullname,
                    'bookhut' => $bookhut->name
                ])
            ]);
        }

        return [
            'status' => 200,
            'message' => 'Welcome, Your BookHut was successfully setup!',
            'data' => $bookhut
                ->fresh()
        ];
    }

    public function update($request){
        $profile = auth()->user()->update($request->except($whitelist = 
        ['photo','password']));
        $profile = auth()->user();

        if($request->password){
            $profile->password = \Hash::make($request->password);
            $profile->update();
        }

        if($request->file('photo')){
            $photo = Str::lower(Str::random(10)). ".jpg";
            $request->file('photo')->storeAs('profiles',$photo,'public');

            $formal = basename(user()->photo);
            if($formal 
            != 'user.jpg' && is_file("storage/profiles/$formal")==true){

                @unlink("storage/profiles/$formal");

            }

            $update = user()->update([
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
            'status' => 200,
            'message' => 'Notification successfully flagged as approved.',
        ];
    }

    public function logout($request){
        if(auth()->check()){

            $logout = auth()->guard()->logout(); // logout from jwt session
            
        }
    }
}
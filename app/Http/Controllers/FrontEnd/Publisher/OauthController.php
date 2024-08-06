<?php

namespace App\Http\Controllers\FrontEnd\Publisher;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Publisher\OauthController as Service;
use Illuminate\Http\Request;

class OauthController extends Controller
{
    public $service;

    public function __construct(Service $service){
        
        /////////////////////////////////////////////////////////

        $this->service = $service;

    }

    public function showLogin(Request $request){
        return view(
            'publisher.login'
        )->with([
            'title' => 'Login'
        ]);
    }

    public function login(Request $request){
        try {

            $login = res($this->service->login($request)); //////

            //get login info
            $token = $login['access_token'];
            $user = $login['data'];

            //store in session
            session()->put([
                'token' => $token,
            ]);

            return redirect()->to(
                '/publisher/dashboard'
            );

        } catch(\Throwable $e){

            return error($e);

        }
    }

    public function showRegister(Request $request){
        return view(
            'publisher.register'
        )->with([
            'title' => 'Register'
        ]);
    }

    public function register(Request $request){
        try {
            
            $register = res($this->service->register($request));

            return redirect()->to(
                '/publisher/login'
            );

        } catch(\Throwable $e){

            return error($e);

        }
    }

    public function profile(Request $request){
        $page = $request->page ?? 'index';
        $view = [
            'security' => 'Security',
            'index' => 'Profile',
            'socials' => 'Socials',
        ][$page];

        return view(
            'publisher.profile.'.$page
        )->with([
            'title' => ucwords ( $view )
        ]);
    }
    
    public function update(Request $request){
        try {
            
            $update = res($this->service->update($request));

            return success(
                $update);

        } catch(\Throwable $e){

            return error($e);

        }
    }

    public function logout(Request $request){
        try {
            
            $logout = res($this->service->logout($request));

            session()->forget([
                'token'
            ]);

            return redirect()->to(
                '/publisher/login'
            );

        } catch(\Throwable $e){

            return error($e);

        }

        ////////////////////////////////////////////////////

    }
}

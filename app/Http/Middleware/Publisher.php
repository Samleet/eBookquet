<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Publisher as Auth;
use Tymon\JWTAuth\JWTAuth;

class Publisher extends Auth
{
    private $jwtAuth;

    public function __construct(JWTAuth $jwtAuth){
        
        $this->jwtAuth = $jwtAuth;

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $user = null;

        try {
            
            $token = session()->get('token');
            /*
            $user = $this->jwtAuth->setToken($token)
                ->toUser();
            */
            $user = auth('publisher')
                  ->setToken($token)->user();

        } catch(\Exception $e){  }

        if(!$user){

            return redirect()->to('/publisher/login')->with($parameter = [

                'status' => 'error',
                'message' => 'Login Session Timeout!'

            ]);

        }

        return $next($request);
        
    }
}

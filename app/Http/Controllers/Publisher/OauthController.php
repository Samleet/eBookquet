<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Services\Publisher\OauthService;
use Illuminate\Http\Request;
use App\Http\Requests\Publisher\LoginRequest;
use App\Http\Requests\Publisher\RegisterRequest;
use App\Http\Requests\Publisher\ProfileRequest;
use App\Exceptions\ApplicationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class OauthController extends Controller
{
    /**
     * @var Oauth
     */
    private $Oauth;

    public function __construct(OauthService $OauthService){
        
        $this->Oauth = $OauthService;

    }

    /**
     * @param LoginRequest $LoginRequest
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function login(Request $request){
        $request->validate(
            (new LoginRequest()
        )->rules());
        
        return response()->json($this->Oauth->login($request));

    }

    /**
     * @param RegisterRequest $RegisterRequest
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function register(Request $request){
        $request->validate(
            (new RegisterRequest()
        )->rules());

        return response()->json($this->Oauth->register($request));

    }

    /**
     * @param Request $Request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function profile(Request $request){

        return response()->json($this->Oauth->profile($request));

    }
    
    /**
     * @param Request $Request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function update(Request $request){
        $request->validate(
            (new ProfileRequest()
        )->rules());

        return response()->json($this->Oauth->update($request));

    }

    /**
     * @param Request $Request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function logout(Request $request){

        return response()->json($this->Oauth->logout($request));

    }
}

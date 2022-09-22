<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\SettingsRequest;
use App\Services\OauthService;
use App\Exceptions\ApplicationException;
use App\Http\Controllers\Controller;
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
     * @param LoginRequest $SigninRequest
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function login(LoginRequest $request){

        return response()->json($this->Oauth->login($request));

    }

    /**
     * @param RegisterRequest $RegisterRequest
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function register(RegisterRequest $request){

        return response()->json($this->Oauth->register($request));

    }

    /**
     * @param Request $Request
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function pinLogin(Request $request){

        return response()->json($this->Oauth->pinLogin($request));

    }

    /**
     * @param ProfileRequest $ProfileRequest
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function update(ProfileRequest $request){

        return response()->json($this->Oauth->update($request));

    }

    /**
     * @param SettingRequest $SettingRequest
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function alert(Request $request){

        return response()->json($this->Oauth->alert($request));

    }

    /**
     * @param SettingRequest $SettingRequest
     * @return JsonResponse
     * @throws ApplicationException
     */
    public function settings(SettingRequest $request){

        return response()->json($this->Oauth->setting($request));

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

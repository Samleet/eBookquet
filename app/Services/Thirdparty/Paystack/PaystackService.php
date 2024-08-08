<?php

namespace App\Services\ThirdParty\Paystack;

use Illuminate\Http\Request;
use App\Exceptions\ApplicationException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class PaystackService {

    private $host = "";

    /**
     * @var  Client  
     */
    private $client  ;

    public function __construct(){

        $this->client = new Client;
        $this->host = "https://api.paystack.co";

    }

    public function __call($n, $v) {
        $http = $protocols = ['get', 'post', 'put', 'delete', 'patch'];

        if(in_array($n, $http)==1) :
        try {
            $request = $this->client->$n(
            "{$this->host}{$v[0]}", $requestOptions = ( array ) array(

                "headers" => $this->__header(),
                "body" => json_encode( $v[1] ),
                
            ));
            $response = json_decode(

                $request->getBody()->getContents(),$toArray = ( true )
                
            );
            return $this->response($response);

        } catch (GuzzleException $exception) {

            return $this->response($exception);

        }
        endif;

        if(in_array($n, $http)==0) :

            if($func = $this->methods[$n] ?? false){ //check for method

                return $func($v);

            }

            throw 
            new \Exception(sprintf('Call to undefined method %s', $n));

        endif;
    }

    public function __header(){
        return [
            "Authorization" => (string)"Bearer "
                               .config('services.paystack.secret_key'),
            "Content-Type" => "application/json"
        ];
    }

    public function response($response = []){
        $exception = 
        $response instanceof GuzzleException;

        if($exception){

            return json_decode(
                /**/$response->getResponse()->getBody()->getContents(),
                true
            ) ?? [];

        }

        return $response;
    }

    public function verify(string $reference){
        return $this->get(
            "/transaction/verify/$reference", /////////////////////////
            $payload = []
        );
    }

    public function lookup(string $account, $bankcode){
        $request = http_build_query(
            array(
            'bank_code' => $bankcode,
            'account_number' => $account
        ));

        return $this->get(
            "/bank/resolve?$request", /////////////////////////////////
            $payload = []
        );
    }

    public function initialize(array $request){
        return $this->post(
            "/transaction/initialize", ////////////////////////////////
            $payload = $request
        );
    }
    
    public function initiate(object $account){
        $request = [
            "type" => "nuban", 
            "name" => $account['holder'], 
            "account_number" => $account['number'], 
            "bank_code" => $account['bankcode'], 
            "currency" => "NGN"
        ];

        return $this->post(
            "/transferrecipient", /////////////////////////////////////
            $payload = $request
        );
    }

    public function transfer(string $account, int $amount){
        $request = [
            "source" => "balance", 
            "amount" => $amount * 100, 
            "recipient" => $account,
            "reason" => 'Payment from ZMSTRATEGY'
        ];
        
        return $this->post(
            "/transfer", //////////////////////////////////////////////
            $payload = $request
        );
    }

    public function transactions(array $query = array()){
        $query = http_build_query($query);

        return $this->get(
            "/transaction?$query", ////////////////////////////////////
            $payload = []
        );
    }

    public function subscriptions(array $query = array()){
        $query = http_build_query($query);

        return $this->get(
            "/subscription?$query", ///////////////////////////////////
            $payload = []
        );
    }

    public function cancelSubscription($code, $token){
        $request = [
            "code" => $code,
            "token" => $token
        ];

        return $this->post(
            "/subscription/disable", //////////////////////////////////
            $payload = $request
        );
    }

    public function createCustomer($request){
        $request = [
            "email" => $request['email'], 
            "first_name" => $request['firstname'], 
            "last_name" => $request['lastname'],
            "phone" => $request['phone'],
            "metadata" => $request['metadata'] ?? [],
        ];

        return $this->post(
            "/customer", //////////////////////////////////////////////
            $payload = $request
        );
    }

    public function virtualAccounts(array $query = array()){
        $query = http_build_query($query);

        return $this->get(
            "/dedicated_account?$query", //////////////////////////////
            $payload = []
        );
    }

    public function createAccount($request, $bank = null){
        $request = [
            "email" => $request['email'], 
            "first_name" => $request['firstname'], 
            "last_name" => $request['lastname'],
            "phone" => $request['phone'],
            "preferred_bank" => $bank ?? 'test-bank'
        ];

        return $this->post(
            "/dedicated_account/assign", //////////////////////////////
            $payload = $request
        );
    }

    public function getAccount($account){
        return $this->get(
            "/dedicated_account/$account", ////////////////////////////
            $payload = []
        );
    }

    public function deleteAccount($account){
        return $this->delete(
            "/dedicated_account/$account", ////////////////////////////
            $payload = []
        );
    }
   
}

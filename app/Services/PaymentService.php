<?php

namespace App\Services;

use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Services\ThirdParty\Paystack\PaystackService;
use Illuminate\Support\Str;

class PaymentService {

    private $paystack;

    public function __construct(PaystackService $service){

        $this->paystack = $service;
        
    }

    public function request($payment){
        /*
        /////////////////////////////////////////////////
        */
        
        $amount = $payment['amount'];
        $email = $payment['email'];
        $reference = $payment['reference'];
        $callback = config(
            'services.paystack.callback_url'
        );

        
        $reference = $reference 
            ?? Str::lower(Str::random(20));

        $payment = $this->paystack->initialize( $args = [
            'amount' => $amount * 100,
            'email' => $email,
            'reference' => $reference,
            'callback_url' => $callback,

        ]);

        return $payment;

        /////////////////////////////////////////////////
        
    }

}
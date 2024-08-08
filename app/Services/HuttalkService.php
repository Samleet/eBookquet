<?php

namespace App\Services;

use App\Models\Huttalk;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Services\ThirdParty\Paystack\PaystackService;
use App\Services\PaymentService;

class HuttalkService {

    private $payment;

    public function __construct(){
        
        $this->payment = new PaymentService(
            new PaystackService
        );

    }

    public function index($request){
        $limit = limit(@$request->limit);
        $huttalks = bookhut()->huttalks()->latest() ->get() ->take(
            $limit
        )->toArray();
        $hutmates = bookhut()->hutmates()->latest() ->get() ->take(
            $limit
        )->toArray();

        $data = [
            'huttalks' => $huttalks,
            'hutmates' => $hutmates,
        ];

        $sort = usort(
            $data['huttalks'], 
            function($a, $b) {

                $order = [
                    'started' => 1, 
                    'pending' => 2, 
                    'finished' => 3
                ];

                return $order[$a['status']]<=>$order[$b['status']];

        });

        return [
            'status' => 200,
            'data' => $data
        ];
    }

    public function create($request){

        return [
            'status' => 200,
            'message' => "You've successfully added book to bookshelf",
            'data' => $bookshelf->fresh()
        ];
    }

    public function show($request){
        $huttalk = bookhut()->huttalks()->findOrFail($request->id);

        return [
            'status' => 200,
            'data' => $huttalk
        ];
    }

    public function update($request){
        $shelf = $this->show($request)['data']; //////////////////////
        $shelf->update(
            $request->all()
        );

        return [
            'status' => 200,
            'data' => 'Bookshelf successfully updated! redirecting...'
        ];
    }

    public function delete($request){
        $shelf = $this->show($request)['data']; //////////////////////
        $rental = $shelf->rental;

        if($rental 
        && $rental->owner() == 1){

            $shelf->rental()
            ->delete();

        }

        $shelf->library()->delete();
        $shelf->delete();

        return [
            'status' => 200,
            'data' => 'Bookshelf successfully deleted! redirecting...'
        ];
    }

}
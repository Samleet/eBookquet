<?php

namespace App\Services;

use App\Models\Book;
use App\Jobs\Payment;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Services\ThirdParty\Paystack\PaystackService;
use App\Services\PaymentService;

class ShelfService {

    private $payment;

    public function __construct(){
        
        $this->payment = new PaymentService(
            new PaystackService
        );

    }

    public function index($request){
        $limit = limit(@$request->limit);
        $bookshelf = bookhut()->bookshelf()->latest() ->get() ->take(
            $limit
        );
        $wishlist = user()->wishlist()->latest()->get()->take($limit);
        $library = bookhut()->library;
        $shelves = [];

        /*
        foreach($bookshelf as $shelf){
            $book = $shelf->book;
            /*
            $book->makeHidden([
                'wishlist', 'comments'
            ]);
            $shelves[] = $shelf;
        }
        */

        $data = [
            'shelves' => $bookshelf,
            'library' => $library,
            'wishlist' => ($wishlist),
        ];

        return [
            'status' => 200,
            'data' => $data
        ];
    }

    public function create($request){
        $book = Book::query()->findOrFail( (int) $request->book_id );
        $rental = $request->rental;
        $reference = $request->reference
            ?? \Str::lower(
            \Str::random(10)
        );
        
        $shelf = bookhut()->bookshelf()
            ->where([
            'book_id' => $book->id
        ])->first();
        
        if($shelf){
            
            throw new ApplicationException(Error::RESOURCE_IS_OWNED );
            
        }
        
        if($rental){
            $payment = $rental['payment'];
            $amount = $payment['amount'];
            $refId = $payment['reference'];

            $payment = array_merge(
                $payment, [
                'email' => user()->email,
                'reference' => $reference,
            ]);

            if(!$refId){

                return /*payment*/ $this->payment->request($payment);

            }
        }

        $bookshelf = bookhut()->bookshelf()
            ->create([
            'bookhut_id' => bookhut()->id,
            'book_id' => $book->id,
            'reference' => $reference,
            'approved' => 1
        ]);

        if($rental){
            $duration = $rental['duration'];
            $readers = $rental['readers'];
            $payment = $rental['payment']; //////////////////////////

            $rental = bookhut()->rentals()
            ->create([
            'user_id' => user()->id,
            'book_id' => $book->id,
            'amount' => $payment['amount'],
            'lease_time' => $duration,
            'readers' => $readers,
            'reference' => $reference
            ]);

            $bookshelf->update([

                'rental_id' => $rental->id,

            ]);

            Payment::dispatch($rental);
        }

        return [
            'status' => 200,
            'message' => "You've successfully added book to bookshelf",
            'data' => $bookshelf->fresh()
        ];
    }

    public function show($request){
        $shelf = bookhut()
            ->bookshelf()
            ->where('book_id', $request->id)
            ->first();
        
        if(!$shelf){
            
            throw new ApplicationException(Error::RESOURCE_NOT_FOUND);
            
        }

        return [
            'status' => 200,
            'data' => $shelf
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
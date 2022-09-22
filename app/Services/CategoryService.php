<?php

namespace App\Services;

use App\Models\Directory;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use Illuminate\Support\Facades\Storage;
use App\Enums\Bookquet;

class CategoryService {

    public function __construct(){
        //

    }

    public function index($request){
        $social = Directory::where('bookquet', Bookquet::SOCIAL)->first();
        $educational = Directory::where('bookquet', Bookquet::EDUCATIONAL)->first();
        $data = [];
        
        if($social){
            $social = Storage::disk('public')->get($social->data);
            $data['social'] = json_decode($social);
        }

        if($educational){
            $educational = Storage::disk('public')->get($educational->data);
            $data['educational'] = json_decode($educational);
        }

        return [
            'data' => $data
        ];
    }

    public function create($request){
        $interest = $request->interest;

        if(!$interest){
            throw new ApplicationException(Error::MISSING_FIELDS); // reject request
        }


        user()->interests()->create([
            'data' => json_encode(
                $interest
            )
        ]);

        return [
            'data' => $interest
        ];

    }

}
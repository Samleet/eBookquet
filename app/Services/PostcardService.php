<?php

namespace App\Services;

use App\Models\Post;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Enums\Access;

class PostcardService {

    public function __construct(){
        //

    }

    public function index($request){
        $postcards = bookhut()->posts()->latest()->take(100)->get();

        return [
            'data' => $postcards
        ];
    }

    public function create($request){
        $postcards = bookhut()->posts()
            ->create([
            'library_id' => $request->id,
            'title' => $request->title,
            'highlight' => $request->highlight,
            'color' => $request->color ? 
            '#'.substr(
                $request->color, 10, -1
            ) : '#4b4e97',
        ]);

        return [
            'message' => "New Note successfully added to this read",
            'data' => $postcards
        ];
    }

    public function show($request){
        $id = $request->id;
        $postcards = bookhut()->cards()->where('library_id', ($id))
        ->latest()
        ->get();

        if($postcards->count() == 0) 
            return;

        return [
            'data' => $postcards
        ];
    }

    public function update($request){
        $postcards = bookhut()->posts()->where('id', $request->id)
        ->first();

        if(!$postcards) 
            return;

        $postcards->update(
            $request->except('color')
        );
        $postcards->update([
            'color' => '#'.substr(
                $request->color, 10, -1
            )
        ]);

        return [
            'data' => $postcards
        ];
    }

    public function delete($request){
        $postcards = bookhut()->posts()->where('id', $request->id)
        ->first();

        if(!$postcards) 
            return;

        $postcards->delete();

        return [
            'message' => "You've successfully deleted reading note",
        ];
    }
}

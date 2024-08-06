<?php

namespace App\Services;

use App\Models\Notecard;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Enums\Access;

class NotecardService {

    public function __construct(){
        //

    }

    public function index($request){
        $notecards = bookhut()->cards()->latest()->take(100)->get();

        return [
            'data' => $notecards
        ];
    }

    public function create($request){
        $notecards = bookhut()->cards()
            ->create([
            'library_id' => $request->id,
            'title' => $request->title,
            'highlight' => $request->highlight,
            'color' => $request->color ? 
            '#'.substr(
                $request->color, 10, -1
            ) : '#666666',
        ]);

        return [
            'message' => "New Note successfully added to this read",
            'data' => $notecards
        ];
    }

    public function show($request){
        $id = $request->id;
        $notecards = bookhut()->cards()->where('library_id', ($id))
        ->latest()
        ->get();

        if($notecards->count() == 0) 
            return;

        return [
            'data' => $notecards
        ];
    }

    public function update($request){
        $notecards = bookhut()->cards()->where('id', $request->id)
        ->first();

        if(!$notecards) 
            return;

        $notecards->update(
            $request->except('color')
        );
        $notecards->update([
            'color' => '#'.substr(
                $request->color, 10, -1
            )
        ]);

        return [
            'data' => $notecards
        ];
    }

    public function delete($request){
        $notecards = bookhut()->cards()->where('id', $request->id)
        ->first();

        if(!$notecards) 
            return;

        $notecards->delete();

        return [
            'message' => "You've successfully deleted reading note",
        ];
    }
}

<?php

namespace App\Services;

use App\Models\Notepad;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Enums\Access;

class NotepadService {

    public function __construct(){
        //

    }

    public function index($request){
        $notepad = bookhut()->notes()->latest()->take(100)->get();

        return [
            'data' => $notepad
        ];
    }

    public function create($request){
        $notepad = bookhut()->notes()
            ->create([
            'title' => $request->title,
            'highlight' => $request->highlight,
            'color' => $request->color ? 
            '#'.substr(
                $request->color, 10, -1
            ) : '#666666',
        ]);

        return [
            'message' => "New Note successfully added to this read",
            'data' => $notepad
        ];
    }

    public function show($request){
        $id = $request->id;
        $notepad = bookhut()->notes()->where('library_id', ($id))
        ->latest()
        ->get();

        if($notepad->count() == 0) 
            return;

        return [
            'data' => $notepad
        ];
    }

    public function update($request){
        $notepad = bookhut()->notes()->where('id', $request->id)
        ->first();

        if(!$notepad) 
            return;

        $notepad->update(
            $request->except('color')
        );
        $notepad->update([
            'color' => '#'.substr(
                $request->color, 10, -1
            )
        ]);

        return [
            'data' => $notepad
        ];
    }

    public function delete($request){
        $notepad = bookhut()->notes()->where('id', $request->id)
        ->first();

        if(!$notepad) 
            return;

        $notepad->delete();

        return [
            'message' => "You've successfully deleted reading note",
        ];
    }
}

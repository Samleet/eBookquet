<?php

namespace App\Services;

use App\Models\Vocal;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Enums\Access;

class VocalService {

    public function __construct(){
        //

    }

    public function index($request){
        $getVocals = bookhut()->vocals()->latest()->take(100)->get();

        return [
            'data' => $getVocals
        ];
    }

    public function create($request){
        $getVocals = bookhut()->vocals()
            ->create([
            'library_id' => $request->id,
            'word' => $request->word,
            'textCount' => strlen($request->word),
            'meaning' => $request->definition,
        ]);

        return [
            'message' => "New Vocal successfully added to this read",
            'data' => $getVocals
        ];
    }

    public function show($request){
        $id = $request->id;
        $getVocals = bookhut()->vocals()->where('library_id', ($id))
        ->latest()
        ->get();

        if($getVocals->count() == 0) 
            return;

        return [
            'data' => $getVocals
        ];
    }

    public function update($request){
        $getVocals = bookhut()->vocals()->where('id', $request->id)
        ->first();

        $getVocals->update([
            'word' => $request->word,
            'textCount' => strlen($request->word),
            'meaning' => $request->definition,
        ]);

        return [
            'data' => $getVocals
        ];
    }

    public function delete($request){
        $getVocals = bookhut()->vocals()->where('id', $request->id)
        ->first();

        if(!$getVocals) 
            return;

        $getVocals->delete();

        return [
            'message' => "You've successfully deleted active vocals.",
        ];
    }
}

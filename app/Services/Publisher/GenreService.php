<?php

namespace App\Services\Publisher;

use App\Models\Genre;
use App\Exceptions\ApplicationException;
use App\Enums\Error;

class GenreService {
        
    public function __construct(){
        
        //////////////////////////////////////////////////////////

    }
    
    public function index($request){
        $genres = /**/publisher()->genres()->paginate($limit =12);

        return [
            'status' => 200,
            'data' => $genres
        ];
    }

    public function create($request){
        $name = $request->name;
        $description = $request->description;
        $limit = $request->limit;

        $genre = publisher()->genres()
            ->create([
            'name' => $name,
            'description' => $description,
            'limit' => $limit,
        ]);

        return [
            'status' => 200,
            'message' => 'The genre has been successfully created',
            'data' => $genre
        ];
    }

    public function show($request){
        $genre = /**/ publisher()->genres()->find(($request->id));

        if(!$genre)
        throw new ApplicationException(Error::RESOURCE_NOT_FOUND);

        return [
            'status' => 200,
            'data' => $genre
        ];
    }

    public function update($request){
        $genre = $this->show($request)['data']; //////////////////
        $name = $genre->name;
        $genre->update($request->all());

        return [
            'status' => 200,
            'message' => "Genre: $name was successfully updated.",
            'data' => $genre
                ->fresh()
        ];
    }

    public function delete($request){
        $genre = $this->show($request)['data']; //////////////////
        $name = $genre->name;
        $genre->delete();

        return [
            'status' => 200,
            'message' => "Genre: $name was successfully deleted.",
        ];
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function user(){
        return $this->belongsTo(User::class)->withDefault([

        ]);
    }

    public function bookquet(){
        return $this->belongsTo(Bookquet::class)->withDefault([

        ]);
    }

    public function bookhut(){
        return $this->belongsTo(Bookhut::class)->withDefault([

        ]);
    }
    
}

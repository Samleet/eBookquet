<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookquet extends Model
{
    use HasFactory;

    protected $table = 'bookquet';

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    public function bookhuts(){
        return $this->hasMany(Bookhut::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function members(){
        return $this->hasMany(Group::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function owner(){
        return user()->id === $this->user_id;
    }

}

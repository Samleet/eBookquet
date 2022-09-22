<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'bookquet_id' => 'integer',
        'bookhut_id' => 'integer',
        'classroom_id' => 'integer',
        'pages' => 'integer',
    ];

    protected $with = [
        'libraries',
        'wishlist',
        'comments'
    ];

    public function storage(){
        return $this->reference.".pdf"; //////
    }

    public function libraries(){
        return $this->hasMany(Library::class);
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}

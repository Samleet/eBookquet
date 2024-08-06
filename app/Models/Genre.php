<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = [''];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'books'
    ];

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function books(){
        return $this->hasMany(Book::class)->without([
            'genre',
        ]);
    }
    
}

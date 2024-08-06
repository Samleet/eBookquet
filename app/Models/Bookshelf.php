<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookshelf extends Model
{
    use HasFactory;

    protected $table = 'bookshelf';
    protected $guarded = [''];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'book',
        'rental',
    ];

    public function bookhut(){
        return $this->belongsTo(Bookhut::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function rental(){
        return $this->hasOne(
            Rental::class, $f='id', 'rental_id'
        );
    }

    public function library(){
        return $this->hasMany(Library::class);
    }
    
}

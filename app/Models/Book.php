<?php

namespace App\Models;

use App\Enums\Book as BookType;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'genre_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'meta' => 'object',
        'sharing' => 'bool'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'genre',
        'wishlist',
        'comments'
    ];

    /**
     * The relationships that should always be append.
     *
     * @var array
     */
    protected $appends = [
        'book',
        'rentals'
    ];

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class,'genre_id')
        ->without([
            'books'
        ]);
    }

    public function rentals(){
        return $this->hasMany(Rental::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function bookshelf(){
        return $this->hasMany(Bookshelf::class);
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function isRental(){

        return ($this->type == BookType::RENTAL) == true;
    }

    public function getAuthorAttribute(){
        $author = $this->attributes['author'];

        if($author == null){
            $author = (string)$this->publisher->fullname;
        }

        unset($this->publisher);

        return $author;

    }

    public function getRentalsAttribute(){
        $renters = $this->bookshelf->count();

        unset($this->bookshelf);

        return $renters;
        
    }

    public function storage(){

        return $file = (string) basename($this->book);
        
    }

    public function scopeActive($query){

        return $query->where('status', '=', 'ACTIVE');
        
    }

    public function getBookAttribute(){
        $ref = $this->reference;
        $format = strtolower(
            /**/ $this->format
        );
        $url = ((string) "storage/books/$ref.$format");

        return asset($url);

    }

}

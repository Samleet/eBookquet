<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $guarded = [''];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'bookshelf_id' => 'integer',
        'book_id' => 'integer',
        'current_page' => 'integer',
        'completed' => 'boolean'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'book',
        'bookshelf',
    ];

    /**
     * The relationships that should always be append.
     *
     * @var array
     */
    protected $appends = [
        'resource'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot() {

        static::deleting(function(Library $lib){

            $lib->cards()->delete();
            $lib->vocals()->delete();
            $lib->posts()->delete();
    
        });

        parent::boot();
        
    }

    public function bookhut(){
        return $this->belongsTo(Bookhut::class);
    }

    public function bookshelf(){
        return $this->belongsTo(Bookshelf::class)
        ->without([
            'book',
            'rental'
        ]);
        
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function url(){
        $user = $this->bookhut
            ->user;
        $book = $this->book;

        unset($this->bookhut);

        $storage = config(
            'storage.book.library'
        ).'/'.$user->ref().'/'.$book->storage();
                    
        return $storage;

    }

    public function cards(){
        return $this->hasMany(Notecard::class);
    }

    public function vocals(){
        return $this->hasMany(Vocal::class);
    }
    
    public function posts(){
        return $this->hasMany(Postcard::class);
    }

    public function getResourceAttribute(){

        return $this->url(); //////////////////

    }

}

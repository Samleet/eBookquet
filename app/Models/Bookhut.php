<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookhut extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'interests' => 'object'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'custodian'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function custodian(){
        return $this->hasOne(Custodian::class);
    }

    public function rentals(){
        return $this->hasMany(Rental::class);
    }

    public function bookshelf(){
        return $this->hasMany(Bookshelf::class);
    }

    public function library(){
        return $this->hasMany(Library::class);
    }

    public function cards(){
        return $this->hasMany(Notecard::class);
    }

    public function notes(){
        return $this->hasMany(Notepad::class);
    }

    public function vocals(){
        return $this->hasMany(Vocal::class);
    }
    
    public function posts(){
        return $this->hasMany(Postcard::class);
    }

    public function spaces(){
        return $this->hasMany(Space::class)
        ->latest();
    }

    public function huttalks(){
        return $this->hasMany(Huttalk::class);
    }

    public function hutchats(){
        return $this->hasMany(Hutchat::class);
    }

    public function hutmates(){
        return $this->hasMany(Hutmate::class);
    }

    // public function owner(){
    //     return User::find($this->user_id);
    // }

    // public function member(int $userId){
    //     $exist = 
    //     $this->members()->where('user_id', $userId)->first();

    //     if($exist && $exist->approved){
    //         return true;
    //     }
    //     return false;
    // }

    // public function collection(User $user){
    //     $collection = [];
    //     $data = [];

    //     foreach($user->library()->get() as $library){
    //         $book = Book::find(
    //             $library->book_id
    //         );
    //         $data[] = $book;

    //         if($book->bookhut_id == $this->id){
    //             $collection[] = $book;
    //         }
    //     }
        
    //     $user->library = $data;
        
    //     return $collection;
        
    //     /////////////////////////////////////////////////////
    // }
    
}

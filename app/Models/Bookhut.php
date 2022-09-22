<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookhut extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'bookquet_id' => 'integer',
        'access_pin' => 'integer',
    ];

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function members(){
        return $this->hasMany(Group::class);
    }

    public function spaces(){
        return $this->hasMany(Space::class)
        ->orderBy('id','DESC');
    }

    public function comments(){
        return $this->hasMany(Chat::class);
    }

    public function owner(){
        return User::find($this->user_id);
    }

    public function member(int $userId){
        $exist = 
        $this->members()->where('user_id', $userId)->first();

        if($exist && $exist->approved){
            return true;
        }
        return false;
    }

    public function collection(User $user){
        $collection = [];
        $data = [];

        foreach($user->library()->get() as $library){
            $book = Book::find(
                $library->book_id
            );
            $data[] = $book;

            if($book->bookhut_id == $this->id){
                $collection[] = $book;
            }
        }
        
        $user->library = $data;
        
        return $collection;
        
        /////////////////////////////////////////////////////
    }
}

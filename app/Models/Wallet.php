<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $guarded = [''];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'publisher_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    static function issue($user){
        $user = $user->fresh()
            ->toArray();
        $isPublisher = @$user['socials'];
        $key = 'user_id';
        if($isPublisher){
            $key = 'publisher_id'; //swapping key
        }

        $wallet = new self;
        $wallet->$key = $user['id'];
        $wallet->save();

        //////////////////////////////////////////

    }
    
}

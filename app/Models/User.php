<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * Get the identifier that will be stored in the  
     * subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom 
     * claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

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
        'password',
        'remember_token',
    ];

    protected $with = [
        'bookquet',
        'bookhuts',
        'wishlist',
        'notifications',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'pin_code' => 'integer'
    ];

    public function getFullNameAttribute(){
        return $this->firstname.' '.$this->lastname;
    }

    public function image(){
        if($this->photo != null){
            return $this->photo;
        }
        return asset(
            'storage/profiles/user.jpg'
        );
    }

    public function signature(){
        $signature = substr(trim(md5($this->id)),  0, 10);

        return $signature;
    }

    public function interests(){
        return $this->hasMany(Interest::class, 'user_id');
    }

    public function settings(){
        return $this->hasMany(Setting::class, 'user_id');
    }

    public function bookquet(){
        return $this->hasMany(Bookquet::class, 'user_id');
    }

    public function notifications(){
        return $this->hasMany(Notification::class)
        ->orderBy('id', 'DESC');
    }

    public function bookhuts(){
        return $this->hasMany(Bookhut::class, 'user_id');
    }

    public function groups(){
        return $this->hasMany(Group::class);
    }

    public function library(){
        return $this->hasMany(Library::class, 'user_id');
    }
    
    public function wishlist(){
        return $this->hasMany(Wishlist::class, 'user_id');
    }
}

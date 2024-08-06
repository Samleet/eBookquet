<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Publisher extends Authenticatable implements JWTSubject
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

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'socials' => 'object',
        'verified' => 'boolean'
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

    public function ref(){
        $signature = substr(trim(md5($this->id)),  0, 10);
        return $signature;
    }

    public function wallet(){
        return $this->hasOne(Wallet::class);
    }

    public function genres(){
        return $this->hasMany(Genre::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class)
        ->orderBy('id', 'DESC');
    }

}

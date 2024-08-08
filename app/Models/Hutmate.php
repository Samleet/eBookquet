<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutmate extends Model
{
    use HasFactory;

    protected $table = 'hutmates';

    protected $guarded = [''];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        //
    ];

    /**
     * The relationships that should always be append.
     *
     * @var array
     */
    protected $appends = [
        'user',        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function bookhut(){
        return $this->belongsTo(Bookhut::class);
    }

    public function getUserAttribute(){
        $id = $this->attributes['user_id'];
        $user = User::find($id);

        if(!$user) 
            return; //user not found in database
        

        return [

            'id' => $user->id,
            'name' => $user->fullname //////////

        ];

    }
    
}

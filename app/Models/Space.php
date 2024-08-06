<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'bookhut_id' => 'integer',
        'members' => 'object'
    ];

    protected $with = [
        'bookhut'
    ];

    public function bookhut(){
        return $this->belongsTo(Bookhut::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function members(){
        $participant = json_decode(json_encode($this->members)
        , 1);

        foreach($participant as $data){
            $key = array_keys($participant, $data)[0];
            $user = User::find($data['user']);

            if(!$user) {
                array_splice($participant , $key, 1 );
                continue;
            }

            $participant[ $key ] ['user'] = $user->toArray( );
        }

        return $participant;
    }

}

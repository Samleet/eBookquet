<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huttalk extends Model
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
        'bookhut_id' => 'integer',
        'members' => 'object'
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
     * The relationships that should always be append.
     *
     * @var array
     */
    protected $appends = [
        'status',        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bookhut(){
        return $this->belongsTo(Bookhut::class);
    }

    public function getStatusAttribute(){
        $start_at = carbon()->parse($this->start_at);
        $ends_at = carbon()->parse($this->ends_at);

        if(now()->lt($start_at) 
        && $ends_at->gt(now())){
            return 'pending';
        }

        if(now()->gt($ends_at)){
            return 'finished';
        }

        /**/return 'started';

    }

    public function getMembersAttribute(){
        $data = [];
        $members = json_decode(
            $this->attributes['members']
        );

        foreach($members as $info){
            $user = User::find($info->user);
            if(!$user) continue;

            $user->makeHidden([
                'bookhut',
                'wallet',
                'settings',
                'dob',
                'device_id',
                'pin_code',
                'notifications'
            ]);

            $info->user = /**/ ((object) $user);

            $data[] = $info;
        }

        return $data;

    }

}

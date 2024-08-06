<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutchat extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function reply(){
        $key = 'reply_to';
        return $this->belongsTo(Chat::class, $key);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bookhut(){
        return $this->belongsTo(Bookhut::class);
    }

}

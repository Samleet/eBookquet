<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutmate extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function bookhut(){
        return $this->belongsTo(Bookhut::class);
    }
    
}
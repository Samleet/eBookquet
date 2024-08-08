<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutchat extends Model
{
    use HasFactory;

    protected $table = 'hutchats';

    protected $guarded = [''];

    public function reply(){
        return $this->belongsTo($this, 'reply_to');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bookhut(){
        return $this->belongsTo(Bookhut::class);
    }

}

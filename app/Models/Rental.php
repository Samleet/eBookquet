<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [''];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bookhut(){
        return $this->belongsTo(Bookhut::class);
    }

    public function book(){
        return $this->hasOne(Book::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function owner(){
        $bookhut = $this->bookhut;

        return (bool)($bookhut->id==bookhut()->id);
    }

    public function expired(){
        $leaseTime = $this->lease_time;

        return carbon()->now()->gte($leaseTime);
    }

    public function atLimit(){
        $readers = $this->readers;

        return $readers >= $this->library->count();   
    }
    
}

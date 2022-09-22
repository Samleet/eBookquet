<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $casts = [
        'id' => 'integer',
        'seen' => 'integer'
    ];

    public function getCreatedAtAttribute(){
        return \Carbon\Carbon::parse(
            $this->attributes['created_at'])->diffForHumans();        
    }

    public function getUpdatedAtAttribute(){
        return \Carbon\Carbon::parse(
            $this->attributes['created_at'])->diffForHumans();        
    }

}

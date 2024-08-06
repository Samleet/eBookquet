<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notepad extends Model
{
    use HasFactory;

    protected $table = 'notepad';

    protected $guarded = [''];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'library_id' => 'integer',
    ];
    
    public function getCreatedAtAttribute(){
        return carbon()->parse(
            $this->attributes['created_at']
        )->format("M d, Y - H:i");
    }

    public function getUpdatedAtAttribute(){
        return carbon()->parse(
            $this->attributes['updated_at']
        )->format("M d, Y - H:i");
    }

}

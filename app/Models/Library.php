<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function notes(){
        return $this->hasMany(Note::class, 'library_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->blongsTo(User::class);
    }
    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
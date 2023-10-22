<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    public function likes()
    {
        return $this->belongsToMany(Like::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function iscrowdeds()
    {
        return $this->hasMany(Iscrowded::class);
    }
}

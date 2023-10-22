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

    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('name', 'DESC')->limit($limit_count)->get();

    }
    
    public function isFlg($user)
    {
        return Iscrowded::where('user_id', $user->id)->where('event_id', $this->id)->first() !== null;
    }
}








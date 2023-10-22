<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iscrowded extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'event_id',
        'evaluation',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected $table = 'iscrowded';
}

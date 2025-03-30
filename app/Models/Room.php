<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms'; // Table ka naam

    protected $primaryKey = 'room_id'; // Primary Key

    protected $fillable = [
        'owner_id', 
        'title', 
        'description', 
        'price', 
        'location', 
        'amenities', 
        'available', 
        'is_verified'
    ];

    protected $casts = [
        'amenities' => 'array', 
        'available' => 'boolean',
        'is_verified' => 'boolean',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'user_id');
    }

}

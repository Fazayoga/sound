<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = ['rental_date', 'rental_time', 'sound_system_id']; // Add 'rental_time'
    protected $table = 'rentals';

    // Define the relationship with the SoundSystem model
    public function soundSystem()
    {
        return $this->belongsTo(SoundSystem::class, 'sound_system_id');
    }
}

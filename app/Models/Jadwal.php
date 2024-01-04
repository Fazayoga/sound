<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = ['rental_date', 'rental_start_time', 'rental_end_time', 'event_name', 'event_address', 'name_location', 'deskripsi', 'sound_system_id', 'user_id']; 
    protected $table = 'rentals';

    // Define the relationship with the SoundSystem model
    public function soundSystem()
    {
        return $this->belongsTo(SoundSystem::class, 'sound_system_id');
    }
}

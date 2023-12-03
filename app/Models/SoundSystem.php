<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoundSystem extends Model
{   
    use HasFactory;

    protected $fillable = ['gambar', 'sound_code', 'judul', 'deskripsi', 'harga', 'status'];
    protected $table = 'sound_systems';
}

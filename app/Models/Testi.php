<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testi extends Model
{
    use HasFactory;
    
    protected $fillable = ['video', 'judul', 'deskripsi'];
    protected $table = 'testi';
}

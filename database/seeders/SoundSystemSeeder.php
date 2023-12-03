<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoundSystem;


class SoundSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SoundSystem::all();
        \App\Models\SoundSystem::findOrFail();
    }
}

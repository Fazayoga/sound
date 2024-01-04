<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\SoundSystemController;

Route::get('/', function () {
    return view('pages.utama');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/order', [OrderController::class, 'index'])->name('pages.order');

// Jadwal
Route::get('/jadwal', [JadwalController::class, 'index'])->name('pages.jadwal');

// RENTAL
Route::resource('rental', RentalController::class);
Route::get('/rental', [RentalController::class, 'index'])->name('rental.index');
Route::get('/rental/{id}', [RentalController::class, 'show'])->name('rental.show');
Route::post('/rental/store', [RentalController::class, 'store'])->name('rental.store');
Route::get('/rental/create', [RentalController::class, 'create'])->name('rental.create');
Route::get('/rentals/edit/{id}', [RentalController::class, 'edit'])->name('rental.edit');
Route::put('/rentals/rental/{id}', [RentalController::class, 'update'])->name('rental.update');
Route::delete('/rentals/{rental}', [RentalController::class, 'destroy'])->name('rental.destroy');
Route::put('/rental/{id}/complete', [RentalController::class, 'complete'])->name('rental.complete');
Route::get('/rental/konfirmasi', [RentalController::class, 'konfirmasi'])->name('rental.konfirmasi');

// Sound System
Route::resource('admin', SoundSystemController::class);
Route::delete('/sound-systems/{sound_system}', [SoundSystemController::class, 'destroy'])->name('sound-systems.destroy');
Route::get('/sound_systems', [SoundSystemController::class, 'index'])->name('admin.index');
Route::get('/sound_systems/create', [SoundSystemController::class, 'create'])->name('admin.create');
Route::post('/sound_systems/store', [SoundSystemController::class, 'store'])->name('admin.store');
Route::get('/sound_systems/show/{id}', [SoundSystemController::class, 'show'])->name('admin.show');
Route::get('/sound_systems/edit/{id}', [SoundSystemController::class, 'edit'])->name('admin.edit');
Route::put('/sound_systems/update/{id}', [SoundSystemController::class, 'update'])->name('admin.update');

// Admin Routes
Route::resource('admin', SoundSystemController::class)->except('show');
Route::get('/admin/testimoni', [TestimoniController::class, 'index'])->name('admin.testi');

// Testimoni
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('admin.testi');

// Testi
Route::get('/testi', [TestiController::class, 'index'])->name('testi.index');
Route::get('/testi/{id}', [TestiController::class, 'show'])->name('testi.show');
Route::get('/testi/create', [TestiController::class, 'create'])->name('testi.create');
Route::post('/testi/store', [TestiController::class, 'store'])->name('testi.store');
Route::get('/testi/edit/{id}', [TestiController::class, 'edit'])->name('testi.edit');
Route::put('/testi/update/{id}', [TestiController::class, 'update'])->name('testi.update');
Route::delete('/testi/{id}', [TestiController::class, 'destroy'])->name('testi.destroy');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout-admin', [AuthController::class, 'logoutAdmin'])->name('logout-admin');
Route::post('/logout-user', [AuthController::class, 'logoutUser'])->name('logout-user');

Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/profil', [AdminController::class, 'profil'])->name('admin.profil');
Route::get('/edit-profil', [AdminController::class, 'edit'])->name('admin.edit_profil');
Route::patch('/update-profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');

Route::middleware('auth:admin')->group(function () {
    // Rute yang memerlukan autentikasi admin
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::get('/akun', [UserController::class, 'profil'])->name('pages.profil');
Route::get('/edit-akun', [UserController::class, 'edit'])->name('pages.edit_profil');
Route::patch('/update-akun', [UserController::class, 'updateProfile'])->name('pages.updateProfile');

Route::middleware('auth:web')->group(function () {
    // Rute yang memerlukan autentikasi user
    Route::get('/index', function () {
        return view('pages.index');
    })->name('index');

});
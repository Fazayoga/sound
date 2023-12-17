<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SoundSystemController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Halaman Pages
Route::get('/', function () {
    return view('pages.utama');
});

Route::get('/index', function () {
    return view('pages.index');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/order', [OrderController::class, 'index'])->name('pages.order');

// RENTAL
// Rute untuk menampilkan formulir persewaan
Route::get('/rental/create', [RentalController::class, 'create'])->name('rental.create');
// Rute untuk menyimpan persewaan
Route::post('/rental/store', [RentalController::class, 'store'])->name('rental.store');
// Rute untuk menampilkan daftar persewaan (indeks)
Route::get('/rental', [RentalController::class, 'index'])->name('rental.index');

// Penutup Halaman Pages

// Menampilkan Home
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::resource('admin', SoundSystemController::class);
Route::delete('/sound-systems/{sound_system}', [SoundSystemController::class, 'destroy'])->name('sound-systems.destroy');
//Route::get('admin/{id}/confirm-delete', [SoundSystemController::class, 'confirmDelete'])->name('admin.confirm-delete');

Route::get('/sound_systems', [SoundSystemController::class, 'index'])->name('admin.index');
Route::get('/sound_systems/create', [SoundSystemController::class, 'create'])->name('admin.create');

//Route::get('/sound_systems/{id}', [SoundSystemController::class, 'show'])->name('admin.show');
Route::post('/sound_systems/store', [SoundSystemController::class, 'store'])->name('admin.store');

Route::get('/sound_systems/show/{id}', [SoundSystemController::class, 'show'])->name('admin.show');
Route::get('/sound_systems/edit/{id}', [SoundSystemController::class, 'edit'])->name('admin.edit');
Route::put('/sound_systems/update/{id}', [SoundSystemController::class, 'update'])->name('admin.update');
//Route::delete('/sound_systems/destroy/{id}', [SoundSystemController::class, 'destroy'])->name('admin.destroy');

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/roles', [RoleController::class, 'index']);
Route::get('/rent_logs', [RentLogController::class, 'index']);

// Login Admin
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register Admin
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
//Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
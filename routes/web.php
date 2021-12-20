<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BabController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DetailKemajuanController;
use App\Http\Controllers\KemajuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailPeranController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PeranController;
use App\Http\Controllers\SantriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

// Route::get('/peran', [PeranController::class, 'index']);
// Route::get('/pengurus', [PengurusController::class, 'index']);
// Route::get('/detailperan', [DetailPeranController::class, 'index']);
// // Route::get('/bab', [BabController::class, 'index']);


// // Route::get('/buku/{id}', [BukuController::class, 'detailbuku'])->middleware('auth');

// Route::get('/kemajuan', [KemajuanController::class, 'index']);
// // Route::get('/detailkemajuan', [DetailKemajuanController::class, 'index']);

Route::get('/updatepengurus', function () {
    return view('dashboard.updatepengurus');
});
Route::get('/updatebuku', function () {
    return view('dashboard.updatebuku');
});
Route::get('/updatebab', function () {
    return view('dashboard.updatebab');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/trainers', function () {
    return view('home.trainers');
});

Route::get('/events', function () {
    return view('home.events');
});

Route::get('/contact', function () {
    return view('home.contact');
});

Route::middleware('auth:web,santri')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/profile', [DashboardController::class, 'profile']);
    Route::get('/dashboard/kemajuan', [DashboardController::class, 'raport']);
    Route::get('/dashboard/kemajuan/{id}', [DashboardController::class, 'detailraport']);
    
    Route::post('/dashboard/buku/create', [BukuController::class, 'create']);
    Route::get('/dashboard/buku/list', [BukuController::class, 'list']);
    Route::post('/dashboard/buku/update/{id}', [BukuController::class, 'update']);
    Route::get('/dashboard/buku/delete/{id}', [BukuController::class, 'delete']);
    Route::get('/dashboard/buku/{id}', [BukuController::class, 'show']);
    Route::get('/dashboard/buku', [BukuController::class, 'index']);

    Route::post('/dashboard/bab/create', [BabController::class, 'create']);
    Route::post('/dashboard/bab/update/{id}', [BabController::class, 'update']);
    Route::get('/dashboard/bab/delete/{id}', [BabController::class, 'delete']);

    Route::post('/dashboard/pengurus/create', [PengurusController::class, 'create']);
    Route::post('/dashboard/pengurus/update/{id}', [PengurusController::class, 'update']);
    Route::get('/dashboard/pengurus/delete/{id}', [PengurusController::class, 'delete']);
    Route::get('/dashboard/pengurus', [DashboardController::class, 'pengurus'])->name('profile');

    Route::post('/dashboard/santri/create', [SantriController::class, 'create']);
    Route::post('/dashboard/santri/update/{id}', [SantriController::class, 'update']);
    Route::get('/dashboard/santri/delete/{id}', [SantriController::class, 'delete']);
    Route::get( '/dashboard/santri', [SantriController::class, 'index']);

    // Route::get('/staff', [DashboardController::class, 'index'])->middleware('auth', 'can:isStaff');
    // Route::get('/guru', [DashboardController::class, 'index'])->middleware('auth', 'can:isGuru');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [LoginController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/tabeldata', function () {
    return view('dashboard.tables-data');
});

Route::get('/hapus/{id}', [DashboardController::class, 'hapus']);

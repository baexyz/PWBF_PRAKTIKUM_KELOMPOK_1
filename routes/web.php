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
Route::get('/peran', [PeranController::class, 'index']);
Route::get('/pengurus', [PengurusController::class, 'index']);
Route::get('/detailperan', [DetailPeranController::class, 'index']);
Route::get('/bab', [BabController::class, 'index']);

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/{id}', [BukuController::class, 'detailbuku']);

Route::get('/santri', [SantriController::class, 'index']);
Route::get('/kemajuan', [KemajuanController::class, 'index']);
Route::get('/detailkemajuan', [DetailKemajuanController::class, 'index']);


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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/profile', [DashboardController::class, 'profile'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () {
    return view('form.register');
});

Route::get('/tabeldata', function () {
    return view('dashboard.tables-data');
});
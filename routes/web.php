<?php

use App\Http\Controllers\DetailPeranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PeranController;

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


Route::get('/test', function () {
    return view('dashboard.index');
});

Route::get('/masuk', function () {
    return view('form.login');
});

Route::get('/pendaftaran', function () {
    return view('form.signup');
});

Route::get('/tabeldata', function () {
    return view('dashboard.tables-data');
});
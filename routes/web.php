<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexcontroller;

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

Route::get('/', [indexcontroller::class, 'index']);

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
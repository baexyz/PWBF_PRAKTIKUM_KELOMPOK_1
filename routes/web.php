<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home.index');
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


Route::get('/test', function () {
    return view('dashboard.index');
});

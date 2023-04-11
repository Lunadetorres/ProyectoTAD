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

use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/reset-password', function () {
    return view('reset-password');
})->name('password.update');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('password.request');

Route::get('/verify-email', function () {
    return view('verify-email');
})->name('verify-email');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
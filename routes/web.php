<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/* Auth */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', function () {
    return view('index');
})->middleware('auth');

/* Books */
Route::resource('books', BookController::class)->middleware('auth');

Route::get('/uj-konyv', function () {
    return view('books-regi.new');
});

Route::get('/konyv-modositas', function () {
    return view('books-regi.edit');
});

Route::get('/konyv-torles', function () {
    return view('books-regi.delete');
});

Route::get('/konyv-lista', function () {
    return view('books-regi.list');
});

Route::get('/uj-tag', function () {
    return view('members.new');
});

Route::get('/tag-modositas', function () {
    return view('members.edit');
});

Route::get('/tag-torles', function () {
    return view('members.delete');
});

Route::get('/tag-lista', function () {
    return view('members.list');
});

Route::get('/kolcsonzes', function () {
    return view('borrow');
});

Route::get('/visszavetel', function () {
    return view('return');
});
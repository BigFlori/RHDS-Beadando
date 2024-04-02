<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/uj-konyv', function () {
    return view('books.new');
});

Route::get('/konyv-modositas', function () {
    return view('books.edit');
});

Route::get('/konyv-torles', function () {
    return view('books.delete');
});

Route::get('/konyv-lista', function () {
    return view('books.list');
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
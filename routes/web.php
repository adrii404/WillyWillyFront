<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view('/', 'home')->name('home'); // loads resources/views/home.blade.php
Route::view('/watch', 'watch')->name('watch');
Route::view('/mechanics', 'mechanics')->name('mechanics');
Route::view('/contact', 'contact')->name('contact');

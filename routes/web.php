<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/home');
    Route::view('/home', 'home')->name('home');
});

<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/email', function () {
    Mail::raw('Hello, World!', function ($message) {
        $message->to('recipient@example.com')
            ->subject('Test Email')->from('sender@example.com');
    });

    echo 'Email sent successfully!';
});

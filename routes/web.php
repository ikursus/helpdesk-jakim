<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
})->name('home');

Route::get('/ticket', function () {

    return view('template-tickets.senarai-tickets');

})->name('ticket.list');

Route::get('/semak/ticket', function () {

    return view('template-tickets.semak-tickets');

})->name('ticket.semak');

Route::get('/tiket/baru', function () {

    return view('template-tickets.ticket-baru');

})->name('ticket.baru');

Route::get('/faq', function () {

    return view('template-tickets.soalan-lazim');

})->name('soalan.lazim');


// Profile User
Route::get('/profile/{username?}', function ($username = null) { // ? means optional

    /// Database Query
    // $user = User::find($username);

    if (!is_null($username))
    {
        return 'Profile User ' . $username;
    }

    return 'Tiada rekod dibekalkan';

})->where('username', '[a-zA-Z]+');

Route::post('/login', fn() => 'Login');

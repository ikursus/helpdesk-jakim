<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;

Route::get('/', HomeController::class)->name('home');

Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.list');
Route::get('/ticket/semak', [TicketController::class, 'semakTicket'])->name('ticket.semak');
Route::get('/tiket/baru', [TicketController::class, 'create'])->name('ticket.baru');
Route::post('/tiket/baru', [TicketController::class, 'store'])->name('ticket.store');

// Route untuk memaparkan senarai users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route untuk memaparkan borang tambah user baru
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route untuk menyimpan data yang dihantar daripada borang tambah user baru
Route::post('/users/create', [UserController::class, 'store'])->name('users.store');


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



// Route::resource('tickets', TicketController::class);

<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
})->name('home');

Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.list');
Route::get('/semak/ticket', [TicketController::class, 'semakTicket'])->name('ticket.semak');
Route::get('/tiket/baru', [TicketController::class, 'create'])->name('ticket.baru');

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

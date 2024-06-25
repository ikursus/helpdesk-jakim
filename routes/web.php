<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('layouts.induk');
})->name('home');

Route::get('/ticket', function () {

    $senaraiTickets = [
        ['id' => 1, 'title' => 'Ticket 1', 'submitter_name' => 'Ali', 'submitter_email' => 'ali@gmail.com'],
        ['id' => 2, 'title' => 'Ticket 2', 'submitter_name' => 'Abu', 'submitter_email' => 'abu@gmail.com'],
        ['id' => 3, 'title' => 'Ticket 3', 'submitter_name' => 'Siti', 'submitter_email' => 'siti@gmail.com'],
        ['id' => 4, 'title' => 'Ticket 4', 'submitter_name' => 'Upin', 'submitter_email' => 'upin@gmail.com'],
        ['id' => 5, 'title' => 'Ticket 5', 'submitter_name' => 'Ipin', 'submitter_email' => 'ipin@gmail.com'],
    ];

    // Cara 1 attach/passing data ke view
    // return view('template-tickets.senarai-tickets')->with('senaraiTickets', $senaraiTickets);

    // Cara 2 attach/passing data ke view
    // return view('template-tickets.senarai-tickets', ['senaraiTickets' => $senaraiTickets]);

    // Cara 3 attach/passing data ke view
    return view('template-tickets.senarai-tickets', compact('senaraiTickets'));

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

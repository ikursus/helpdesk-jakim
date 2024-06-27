<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiTickets = DB::table('tickets')->get();

        // Cara 1 attach/passing data ke view
        // return view('template-tickets.senarai-tickets')->with('senaraiTickets', $senaraiTickets);

        // Cara 2 attach/passing data ke view
        // return view('template-tickets.senarai-tickets', ['senaraiTickets' => $senaraiTickets]);

        // Cara 3 attach/passing data ke view
        return view('template-tickets.senarai-tickets', compact('senaraiTickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('template-tickets.ticket-baru');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(TicketRequest $request)
    public function store(Request $request)
    {
        // $data = $request->validated();
        // Validate input
        $data = $request->validate([
            // 'submitter_name' => 'required|min:3|string',
            // 'submitter_email' => ['required', 'email:filter'],
            'title' => ['required', 'min:5', 'string'],
            'content' => ['nullable', 'sometimes', 'min:5'],
            'category' => ['required', 'in:general,sales,technical']
        ]);

        // Dapatkan data user_id daripada session user yang tengah login dalam sistem
        // Buat masa ni kita dapatkan random user daripada table users
        $user = DB::table('users')->inRandomOrder()->first();
        // Attachkan data yang diperlukan oleh table tickets kepada variable $data untuk disimpan
        // ke dalam table tickets
        $data['user_id'] = $user->id;
        $data['submitter_name'] = $user->name;
        $data['submitter_email'] = $user->email;

        // Simpan data ke dalam table tickets
        DB::table('tickets')->insert($data);

        toast('Rekod berjaya disimpan!', 'success');

        return redirect()->route('ticket.list');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function semakTicket(Request $request)
    {
        $id = $request->input('username');

        return $id;

        return view('template-tickets.semak-tickets');
    }
}

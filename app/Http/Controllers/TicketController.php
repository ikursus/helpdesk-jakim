<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            'submitter_name' => 'required|min:3|string',
            'submitter_email' => ['required', 'email:filter'],
            'title' => ['required', 'min:5', 'string'],
            'content' => ['nullable', 'sometimes', 'min:5'],
            'category' => ['required', 'in:general,sales,technical']
        ]);

        // $data = $request->all();
        // $data = $request->input('submitter_name'); // $request->submitter_name;
        // $data = $request->only('submitter_name', 'submitter_email');
        // $data = $request->except('submitter_name');
        // Untuk semak ada file attach
        // $request->hasFile('attachment')
        // $request->filled('submitter_name')
        // $request->file('attachment')

        // Dump and Die
        dd($data);
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

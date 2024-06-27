<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Ticket;
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
        //$senaraiTickets = DB::table('tickets')->get();
        // Join table menggunakan kaedah query builder
        // $senaraiTickets = DB::table('tickets')
        // ->join('users', 'tickets.user_id', '=', 'users.id')
        // ->select('tickets.*', 'users.phone as submitter_phone')
        // ->get();
        $senaraiTickets = Ticket::with('getUser')->get();

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
        // DB::table('tickets')->insert($data);
        // Cara 1 Simpan Data Menggunakan Model
        // $ticket = new Ticket;
        // $ticket->title = $data['title'];
        // $ticket->content = $data['content'];
        // $ticket->category = $data['category'];
        // $ticket->user_id = $data['user_id'];
        // $ticket->submitter_name = $data['submitter_name'];
        // $ticket->submitter_email = $data['submitter_email'];
        // $ticket->save();

        // Cara 2
        Ticket::create($data);

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
    public function update(Request $request, $id)
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
        // Teknik find id
        $ticket = Ticket::find($id);
        $ticket->update($data);

        toast('Rekod berjaya disimpan!', 'success');

        return redirect()->route('ticket.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Penggunaan find() atau findOrFail() hanya untuk id / primary_key
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        toast('Rekod berjaya dihapuskan!', 'success');

        return redirect()->route('ticket.list');
    }

    public function semakTicket(Request $request)
    {
        $id = $request->input('username');

        return $id;

        return view('template-tickets.semak-tickets');
    }
}

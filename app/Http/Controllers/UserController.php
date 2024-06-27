<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Dapatkan senarai users
        // SELECT * FROM users
        // $senaraiUsers = DB::table('users')->orderBy('id', 'desc')->get();
        // $senaraiUsers = DB::table('users')->latest('id')->get();
        // $senaraiUsers = DB::table('users')
        // ->where('status', '=', $request->status)
        // ->orderBy('id', 'desc')
        // ->paginate(5);

        $query = DB::table('users')->orderBy('id', 'desc');

        if ($request->filled('status'))
        {
            $query->where('status', '=', $request->status);
        };

        $senaraiUsers = $query->paginate(3);
        $senaraiUsers->appends(['status' => $request->status]);

        return view('template-users.senarai-users', compact('senaraiUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('template-users.borang-user-baru');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data daripada borang
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:filter',
            'password' => [
                'required', 'confirmed', Password::min(3)
                // ->letters()
                // ->mixedCase()
                // ->numbers()
                // ->symbols()
                // ->uncompromised()
            ],
            'phone' => 'nullable|sometimes',
            'status' => 'required'
        ]);

        // dd($data);
        // Jika tiada masalah dengan validation
        // Encrypt password dahulu
        $data['password'] = bcrypt($request->input('password'));

        // Simpan data ke dalam table users
        DB::table('users')->insert($data);

        // Jika tiada masalah dengan kemasukan data,
        // Redirect ke halaman senarai users.
        return redirect()->route('users.index');
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
}

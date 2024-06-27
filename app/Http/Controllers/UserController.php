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

        // Preparekan statement query untuk dapatkan user dan sorting latest record di atas sekali
        $query = DB::table('users')->orderBy('id', 'desc');

        // Semak JIKA ada status, maka tambah extra query untuk dapatkan status users
        if ($request->filled('status'))
        {
            $query->where('status', '=', $request->status);
        };

        // Buat pagination
        $senaraiUsers = $query->paginate(3);

        // Jika ada additional parameter, appends kan parameter tersebut
        // supaya apabila pagination berlaku, parameter dibawa kepada setiap page
        $senaraiUsers->appends(['status' => $request->status]);

        // Jika tiada masalah, paparkan template senarai users
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
            'email' => 'required|email:filter|unique:users,email',
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
        // Ambil data user berdasarkan id
        $user = DB::table('users')->where('id', $id)->first();

        // Paparkan borang kemaskini / edit rekod user
        //return view('template-users.borang-user-edit', compact('user'));
        return view('template-users.borang-user-edit', ['user' => $user]);
        //return view('template-users.borang-user-edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate data daripada borang
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:filter|unique:users,email,' . $id,
            'phone' => 'nullable|sometimes',
            'status' => 'required'
        ]);

        // Semak jika ruangan password diisi,
        // maka buat validasi dan kemudian encrypt data
        if ($request->filled('password'))
        {
            $request->validate([
                'password'=> [
                    'confirmed', Password::min(3)
                ],
            ]);
            // Sisip/Attachkan data password kepada $variable $data
            $data['password'] = bcrypt($request->input('password'));
        }

        // Kemaskini rekod user dengan data baru
        DB::table('users')->where('id', '=', $id)->update($data);

        // Sweetalert package
        toast('Rekod Berjaya Dikemaskini!','success');
        // alert()->success('Berjaya', 'Rekod Berjaya Dikemaskini!');

        // Jika tiada masalah, redirect user ke halaman senarai users
        // Sertakan sekali flash messaging untuk ayat notifikasi
        return redirect()->route('users.index')->with('alert-berjaya', 'Rekod Berjaya Dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari user berdasarkan ID untuk dihapuskan
        DB::table('users')->where('id', '=', $id)->delete();
        // Sweetalert package
        toast('Rekod Berjaya Dihapuskan!','success');
        // alert()->success('Berjaya', 'Rekod Berjaya Dikemaskini!');

        // Jika tiada masalah, redirect user ke halaman senarai users
        // Sertakan sekali flash messaging untuk ayat notifikasi
        return redirect()->route('users.index')->with('alert-berjaya', 'Rekod Berjaya Dihapuskan!');
    }
}

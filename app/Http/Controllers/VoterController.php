<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $data = \App\Models\User::where('role','pemilih')->get();

    return view('voters.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'nik' => 'required|unique:voters|unique:users,email',
    ]);

    // buat akun login
    $user = \App\Models\User::create([
        'name' => $request->nama,
        'email' => $request->nik, // login pakai nik
        'password' => bcrypt($request->nik),
        'role' => 'user'
    ]);

    // simpan data pemilih
    \App\Models\Voter::create([
        'nama' => $request->nama,
        'nik' => $request->nik,
        'user_id' => $user->id,
        'status_vote' => 0
    ]);

    return redirect('/voters')->with('success','Pemilih berhasil ditambah');
}

    /**
     * Display the specified resource.
     */
    public function show(Voter $voter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voter $voter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voter $voter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $user = \App\Models\User::findOrFail($id);

    // hapus vote
    \App\Models\Vote::where('user_id', $id)->delete();

    // hapus voter berdasarkan user_id ATAU nik
    \App\Models\Voter::where('user_id', $id)
        ->orWhere('nik', $user->email)
        ->delete();

    // hapus user
    $user->delete();

    return redirect('/voters')->with('success', 'Data pemilih berhasil dihapus');
}
}

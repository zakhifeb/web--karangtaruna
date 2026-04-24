<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function index()
{
    $cek = \App\Models\Vote::where('user_id', auth()->id())->exists();

    if ($cek) {
        return redirect('/sudah-voting');
    }

    $data = Candidate::all();
    return view('vote', compact('data'));
}

  public function store(Request $request)
{
    $user = auth()->user();

    // cari pemilih berdasarkan NIK
    $voter = \App\Models\Voter::where('nik', $user->email)->first();

    if (!$voter) {
        return back()->with('error', 'Anda bukan pemilih resmi');
    }

    // cek sudah voting
    if ($voter->status_vote == 1) {
        return redirect('/sudah-voting');
    }

    // simpan vote
    \App\Models\Vote::create([
        'user_id' => $user->id,
        'candidate_id' => $request->candidate_id
    ]);

    // update status
    $voter->update([
        'status_vote' => 1
    ]);

    return redirect('/sudah-voting');
}
}
<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Voter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik utama
        $calon   = Candidate::count();
        $pemilih = Voter::count();
        $sudah   = Voter::where('status_vote', 1)->count();
        $belum   = Voter::where('status_vote', 0)->count();

        // Ambil semua kandidat + jumlah vote
        $kandidat = Candidate::withCount('votes')->get();

        // Cari suara tertinggi
        $maxVote = $kandidat->max('votes_count');

        // Ambil kandidat dengan suara tertinggi
        $pemenang = $kandidat->where('votes_count', $maxVote);

        // Hitung persentase partisipasi
        $persen = $pemilih > 0
            ? round(($sudah / $pemilih) * 100)
            : 0;

        return view('dashboard', compact(
            'calon',
            'pemilih',
            'sudah',
            'belum',
            'kandidat',
            'pemenang',
            'maxVote',
            'persen'
        ));
    }
}
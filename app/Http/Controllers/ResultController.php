<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;

class ResultController extends Controller
{
    public function index()
    {
        $data = Candidate::withCount('votes')->get();

        $total = Vote::count();

        return view('results', compact('data','total'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $data = Candidate::all();
        return view('candidates.index', compact('data'));
    }

    public function create()
    {
        return view('candidates.create');
    }

    public function store(Request $request)
    {
        $foto = null;

        if($request->hasFile('foto')){
        $foto = $request->file('foto')->store('candidates','public');
    }

        Candidate::create([
        'nama' => $request->nama,
        'foto' => $foto,
        'visi' => $request->visi,
        'misi' => $request->misi,
    ]);

        return redirect()->route('candidates.index');
    }

    public function edit($id)
    {
        $item = Candidate::findOrFail($id);
        return view('candidates.edit', compact('item'));
    }

    public function update(Request $request, $id)
{
    $item = Candidate::findOrFail($id);

    $data = [
        'nama' => $request->nama,
        'visi' => $request->visi,
        'misi' => $request->misi,
    ];

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto')->store('candidates', 'public');
        $data['foto'] = $foto;
    }

    $item->update($data);

    return redirect()->route('candidates.index')
        ->with('success', 'Data berhasil diupdate');
}

    public function destroy($id)
    {
        Candidate::destroy($id);

        return redirect()->route('candidates.index');
    }
}
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses login
     */
   public function store(Request $request): RedirectResponse
{
    $request->validate([
        'nik' => ['required'],
        'password' => ['required'],
    ]);

    if (Auth::attempt([
        'email' => $request->nik,
        'password' => $request->password
    ])) {

        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect('/dashboard');
        }

        if (Auth::user()->role === 'pemilih') {
            return redirect('/vote');
        }

        Auth::logout();

        return back()->withErrors([
            'nik' => 'Role tidak dikenali'
        ]);
    }

    return back()->withErrors([
        'nik' => 'NIK atau password salah'
    ]);
}
}
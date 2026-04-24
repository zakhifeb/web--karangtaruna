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

            // Admin ke dashboard
            if (Auth::user()->role === 'admin') {
                return redirect('/dashboard');
            }

            // User / Pemilih ke vote
            if (
                Auth::user()->role === 'user' ||
                Auth::user()->role === 'pemilih'
            ) {
                return redirect('/vote');
            }

            // Jika role aneh
            Auth::logout();

            return back()->withErrors([
                'nik' => 'Role tidak dikenali'
            ]);
        }

        return back()->withErrors([
            'nik' => 'NIK atau password salah'
        ]);
    }

    /**
     * Logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        return redirect('/login');
    }
}
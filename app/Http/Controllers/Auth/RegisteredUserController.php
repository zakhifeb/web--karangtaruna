<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Voter;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'numeric', 'digits_between:8,20', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat akun user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email, // email dipakai sebagai NIK
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        // Simpan ke tabel pemilih
        Voter::create([
            'nama'        => $request->name,
            'nik'         => $request->email,
            'user_id'     => $user->id,
            'status_vote' => 0,
        ]);

        event(new Registered($user));

        // Setelah daftar diarahkan ke login
        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login');
    }
}
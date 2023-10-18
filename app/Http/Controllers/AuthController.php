<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function profile(Request $request)
    {
        // Retrieve user data from the session
        $user = $request->session()->get('user');

        // Check if the user is authenticated (optional, but recommended)
        if (!$user) {
            // Redirect the user or perform some other action for unauthenticated users
        }

        return view('content.pages.pages-account-settings-account', ['user' => $user]);
    }


    public function registerView()
    {
        return view('register');
    }

    public function authenticate(Request $request): RedirectResponse // Login function
    {
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($user)) {
            // Store user data in the session
            $user = Auth::user();
            $request->session()->put('user', $user);

            return redirect()->intended('dashboard')->with('message', 'Berhasil Login');
        }

        return back()->withErrors([
            'email' => 'Data tidak cocok'
        ])->onlyInput('email');
    }

    public function register(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // You can log in the user after registration if desired
        Auth::login($user);

        return redirect()->route('login-view')->with('message', 'Akun berhasil didaftarkan');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

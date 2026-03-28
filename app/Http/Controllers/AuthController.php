<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
       
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('products.index')
                ->with('success', 'Prihlásenie bolo úspešné.');
        }

        return back()->withErrors([
            'email' => 'Nesprávny e-mail alebo heslo.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('products.index')
            ->with('success', 'Boli ste odhlásený.');
    }
}

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
        $credentials = $request->only('nome_usuario', 'senha');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('home')
                             ->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'nome_usuario' => 'As credenciais fornecidas não coincidem com nossos registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

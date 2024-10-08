<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'senha' => 'required'
        ]);

        $user = Usuario::where('email', $request->email)
                ->orWhere('matricula', $request->email)
                ->orWhere('nome_usuario', $request->email)
                ->first();

        if(!$user){
            return redirect()->route("login")->withInput()->with("error", "Erro no login. Verifique os dados inseridos.");
        }

        if($request->senha == $user->senha){
            Auth::login($user, true);
            return redirect()->route('home');
        }

        return redirect()->route("login")->withInput()->with("error", "Erro no login. Verifique os dados inseridos.");
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect()->intended(route('home'));
    }
}

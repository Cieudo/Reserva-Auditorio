<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create'); // Carrega a view para criar um novo usuário
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_usuario' => 'required|string|max:45',
            'senha' => 'required|string|min:8', // Garantir que as senhas tenham um tamanho mínimo
        ]);

        $request['senha'] = bcrypt($request->senha); // Criptografando a senha

        Usuario::create($request->only('nome_usuario', 'senha'));

        return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_usuario' => 'required|string|max:45',
            'senha' => 'nullable|string|min:8', // 'senha' é opcional ao atualizar
        ]);

        $usuario = Usuario::findOrFail($id);

        // Apenas criptografa e atualiza a senha se ela foi preenchida no formulário
        if ($request->filled('senha')) {
            $request->merge(['senha' => bcrypt($request->senha)]);
            $usuario->update($request->only('nome_usuario', 'senha'));
        } else {
            $usuario->update($request->only('nome_usuario'));
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
}

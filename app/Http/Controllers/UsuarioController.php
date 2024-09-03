<?php

namespace App\Http\Controllers;

use Auth;
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

    function comparaSenhas($senha1, $senha2){
        if ($senha1 == $senha2){
            return true;
        }else{
            return false;
        }
    }

    public function store(Request $request)
    {

        $s1 = $request->CampoSenha;
        $s2 = $request->CampoConfirmSenha;
        if (!$this->comparaSenhas($s1, $s2)){
            return redirect()->route('usuarios.index')->withInput()->with("error", "Senhas diferentes. Verifique os dados inseridos.");
        }

        $request->validate([
            'nome_usuario' => 'required|string|max:45',
            'senha' => 'required|string|min:8', 
        ]);

        $register = new Usuario;

        $register->nome_usuario = $request->campoNome;
        $register->email = $request->campoEmail;
        $register->senha = $request->campoSenha;
        $register->vinculo = $request->campoVinculo;
        $register->matricula = $request->campoMatricula;
        $register->curso = $request->campoCurso;

        $register->save();

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

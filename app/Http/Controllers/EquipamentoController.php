<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:45',
            'quantidade' => 'required|integer',
            'descricao' => 'nullable|string|max:45',
        ]);

        Equipamento::create($request->all());

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento cadastrado com sucesso!');
    }

    public function edit($id)
{
    $equipamento = Equipamento::findOrFail($id);
    return view('equipamentos.edit', compact('equipamento'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required|string|max:45',
        'quantidade' => 'required|integer',
        'descricao' => 'nullable|string|max:45',
    ]);

    $equipamento = Equipamento::findOrFail($id);
    $equipamento->update($request->all());

    return redirect()->route('equipamentos.index')->with('success', 'Equipamento atualizado com sucesso!');
}

public function destroy($id)
{
    $equipamento = Equipamento::findOrFail($id);
    $equipamento->delete();

    return redirect()->route('equipamentos.index')->with('success', 'Equipamento excluído com sucesso!');
}

}

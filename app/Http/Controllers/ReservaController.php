<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Equipamento;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('equipamento')->get();
        $equipamentos = Equipamento::all();
        return view('reservas.index', compact('reservas', 'equipamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_equipamentos' => 'required|exists:equipamentos,id_equipamentos',
            'user_id' => 'required|exists:usuario,id_usuario', // Corrigido
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'local' => 'required|string|max:45',
            'quantidade' => 'required|integer',
        ]);
    
        Reserva::create($request->all());
    
        return redirect()->route('reservas.index')->with('success', 'Reserva realizada com sucesso!');
    }

    public function edit($id)
{
    $reserva = Reserva::findOrFail($id);
    return view('reservas.edit', compact('reserva'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'id_equipamentos' => 'required|integer',
        'vinculo' => 'required|in:aluno,professor',
        'data_inicio' => 'required|date',
        'data_fim' => 'required|date',
        'local' => 'required|string|max:45',
        'quantidade' => 'required|integer',
    ]);

    $reserva = Reserva::findOrFail($id);
    $reserva->update($request->all());

    return redirect()->route('reservas.index')->with('success', 'Reserva atualizada com sucesso!');
}

public function destroy($id)
{
    $reserva = Reserva::findOrFail($id);
    $reserva->delete();

    return redirect()->route('reservas.index')->with('success', 'Reserva excluída com sucesso!');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Equipamento;

class ReservaController extends Controller
{

    public function create()
    {
        // Retorne a view para o formulário de criação
        return view('reservas.index');
    }
    public function index()
    {
        $reservas = Reserva::with('equipamento')->get();
        $equipamentos = Equipamento::all();
        return view('reservas.index', compact('reservas', 'equipamentos'));
    }

    public function store(Request $request)
    {
        // Validar se o id_equipamentos está presente e não é vazio
        $request->validate([
            'id_equipamentos' => 'required|integer',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'local' => 'required|string',
            'quantidade' => 'required|integer|min:1',
        ]);
    
        $register = new Reserva;
        $register->id_equipamentos = $request->id_equipamentos;
        $register->data_inicio = $request->data_inicio;
        $register->data_fim = $request->data_fim;
        $register->local = $request->local;
        $register->quantidade = $request->quantidade;
        $register->user_id = auth()->id();
    
        $register->save();

        // Reserva::create($request->all());
    
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

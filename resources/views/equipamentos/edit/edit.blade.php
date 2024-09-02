@extends('layouts.app')

@section('content')
    <h1>Editar Equipamento</h1>

    <form action="{{ route('equipamentos.update', $equipamento->id_equipamentos) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome do Equipamento:</label>
        <input type="text" id="nome" name="nome" value="{{ $equipamento->nome }}" required>
        <br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" value="{{ $equipamento->quantidade }}" required>
        <br>
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="{{ $equipamento->descricao }}">
        <br>
        <button type="submit">Salvar Alterações</button>
    </form>

    <form action="{{ route('equipamentos.destroy', $equipamento->id_equipamentos) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir Equipamento</button>
    </form>
@endsection

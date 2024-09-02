@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Cadastroo de Equipamentos</h1>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('equipamentos.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nome"><i class="fas fa-cogs"></i> Nome:</label>
                        <input type="text" id="nome" name="nome" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="quantidade"><i class="fas fa-plus"></i> Quantidade:</label>
                        <input type="number" id="quantidade" name="quantidade" class="form-control" required>
                    </div>
                    
                    
                    <div class="form-group mb-3">
                        <label for="descricao"><i class="fas fa-info-circle"></i> Descrição:</label>
                        <input type="text" id="descricao" name="descricao" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar Equipamento</button>
                </form>
            </div>
        </div>

        <h2 class="mt-5">Lista de Equipamentos</h2>
        <ul class="list-group">
            @foreach ($equipamentos as $equipamento)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-cogs"></i> {{ $equipamento->nome }}
                        <span class="badge badge-secondary">{{ $equipamento->quantidade }}</span>
                    </div>
                    <div>
                        <a href="{{ route('equipamentos.edit', $equipamento->id_equipamentos) }}" class="btn btn-warning btn-sm text-white mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('equipamentos.destroy', $equipamento->id_equipamentos) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

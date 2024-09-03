@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-edit"></i> Editar Equipamento</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('equipamentos.update', $equipamento->id_equipamentos) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nome"><i class="fas fa-tag"></i> Nome do Equipamento:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $equipamento->nome }}" required>
                    </div>

                    <div class="form-group">
                        <label for="quantidade"><i class="fas fa-layer-group"></i> Quantidade:</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $equipamento->quantidade }}" required>
                    </div>

                    <div class="form-group">
                        <label for="descricao"><i class="fas fa-align-left"></i> Descrição:</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $equipamento->descricao }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center mt-3">
            <form action="{{ route('equipamentos.destroy', $equipamento->id_equipamentos) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este equipamento?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Excluir Equipamento
                </button>
            </form>
        </div>
    </div>
@endsection

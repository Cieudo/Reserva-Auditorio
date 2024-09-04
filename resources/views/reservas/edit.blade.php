@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Reserva</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('reservas.update', $reserva->id_reserva) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-3">
                        <label for="local"><i class="fas fa-map-marker-alt"></i> Local:</label>
                        <input type="text" id="local" name="local" value="{{ $reserva->local }}" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="data_inicio"><i class="fas fa-calendar-alt"></i> Data de Início:</label>
                        <input type="datetime-local" id="data_inicio" name="data_inicio" value="{{ $reserva->data_inicio }}" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="data_fim"><i class="fas fa-calendar-check"></i> Data de Fim:</label>
                        <input type="datetime-local" id="data_fim" name="data_fim" value="{{ $reserva->data_fim }}" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar Alterações</button>
                </form>

                <form action="{{ route('reservas.destroy', $reserva->id_reserva) }}" method="POST" class="mt-3" onsubmit="return confirm('Tem certeza que deseja excluir esta reserva?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir Reserva</button>
                </form>
            </div>
        </div>
    </div>
@endsection

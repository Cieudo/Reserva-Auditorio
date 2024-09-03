@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-edit"></i> Editar Reserva</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="id_equipamentos"><i class="fas fa-cogs"></i> Equipamento:</label>
                        <select id="id_equipamentos" name="id_equipamentos" class="form-control" required>
                            @foreach ($equipamentos as $equipamento)
                                <option value="{{ $equipamento->id }}" {{ $reserva->id_equipamentos == $equipamento->id ? 'selected' : '' }}>
                                    {{ $equipamento->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="vinculo"><i class="fas fa-user-tag"></i> Vínculo:</label>
                        <select id="vinculo" name="vinculo" class="form-control" required>
                            <option value="aluno" {{ $reserva->vinculo == 'aluno' ? 'selected' : '' }}>Aluno</option>
                            <option value="professor" {{ $reserva->vinculo == 'professor' ? 'selected' : '' }}>Professor</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="data_inicio"><i class="fas fa-calendar-day"></i> Data de Início:</label>
                        <input type="date" id="data_inicio" name="data_inicio" class="form-control" value="{{ $reserva->data_inicio }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="data_fim"><i class="fas fa-calendar-day"></i> Data de Fim:</label>
                        <input type="date" id="data_fim" name="data_fim" class="form-control" value="{{ $reserva->data_fim }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="local"><i class="fas fa-map-marker-alt"></i> Local:</label>
                        <input type="text" id="local" name="local" class="form-control" value="{{ $reserva->local }}" required>
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
            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir esta reserva?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Excluir Reserva
                </button>
            </form>
        </div>
    </div>
@endsection

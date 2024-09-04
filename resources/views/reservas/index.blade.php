@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Reservas de Equipamentos</h1>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('reservas.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="id_equipamentos"><i class="fas fa-cogs"></i> Equipamento:</label>
                        <select id="id_equipamentos" name="id_equipamentos" class="form-control" required>
                            <option value="">Selecione o Equipamento</option>
                            @foreach ($equipamentos as $equipamento)
                                <option value="{{ $equipamento->id_equipamentos }}">{{ $equipamento->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="data_inicio"><i class="fas fa-calendar-day"></i> Data de Início:</label>
                        <input type="date" id="data_inicio" name="data_inicio" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="data_fim"><i class="fas fa-calendar-day"></i> Data de Fim:</label>
                        <input type="date" id="data_fim" name="data_fim" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="local"><i class="fas fa-map-marker-alt"></i> Local:</label>
                        <input type="text" id="local" name="local" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="quantidade"><i class="fas fa-plus"></i> Quantidade:</label>
                        <input type="number" id="quantidade" name="quantidade" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Fazer Reserva</button>
                </form>
            </div>
        </div>

        <h2 class="mt-5">Lista de Reservas</h2>
        <ul class="list-group">
            @foreach ($reservas as $reserva)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-cogs"></i> {{ $reserva->equipamento->nome }} reservado para {{ $reserva->local }} de {{ $reserva->data_inicio }} até {{ $reserva->data_fim }} por {{ ucfirst($reserva->vinculo) }}
                    </div>
                    <div>
                        <a href="{{ route('reservas.edit', $reserva->id_reserva) }}" class="btn btn-warning btn-sm text-white mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('reservas.destroy', $reserva->id_reserva) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');" style="display:inline;">
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

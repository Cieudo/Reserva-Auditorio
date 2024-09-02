@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Cadastro de Usuários</h1>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nome_usuario"><i class="fas fa-user"></i> Nome:</label>
                        <input type="text" id="nome_usuario" name="nome_usuario" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="senha"><i class="fas fa-lock"></i> Senha:</label>
                        <input type="password" id="senha" name="senha" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar Usuário</button>
                </form>
            </div>
        </div>

        <h2 class="mt-5">Lista de Usuários</h2>
        <ul class="list-group">
            @foreach ($usuarios as $usuario)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-user"></i> {{ $usuario->nome_usuario }}
                    </div>
                    <div>
                        <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn btn-warning btn-sm text-white mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');" style="display:inline;">
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

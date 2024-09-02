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
                        <label for="campoNome"><i class="fas fa-user"></i> Nome:</label>
                        <input type="text" id="campoNome" name="campoNome" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="campoEmail"><i class="fas fa-user"></i> Email:</label>
                        <input type="email" id="campoEmail" name="campoEmail" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="campoVinculo"><i class="fas fa-user"></i> Vínculo:</label>
                        <input type="text" id="campoVinculo" name="campoVinculo" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="campoMatricula"><i class="fas fa-user"></i> Matrícula:</label>
                        <input type="text" id="campoMatricula" name="campoMatricula" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="campoCurso"><i class="fas fa-user"></i> Curso:</label>
                        <input type="text" id="campoCurso" name="campoCurso" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="campoSenha"><i class="fas fa-lock"></i> Senha:</label>
                        <input type="password" id="campoSenha" name="campoSenha" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="CampoConfirmSenha"><i class="fas fa-lock"></i> Confirmar Senha:</label>
                        <input type="password" id="CampoConfirmSenha" name="CampoConfirmSenha" class="form-control" required>
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
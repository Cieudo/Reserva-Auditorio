@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-user-edit"></i> Editar Usuário</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="GET">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nome"><i class="fas fa-user"></i> Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $usuario->nome_usuario }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}" required>
                    </div>

                    <div class="form-group">
                      <label for="campoVinculo"><i class="fas fa-id-badge"></i> Vínculo:</label>
                      <select name="campoVinculo" id="campoVinculo"  class="form-control" required>
                          <option value="" disabled selected>Escolha</option>
                          <option value="professor">Professor</option>
                          <option value="aluno">Aluno</option>
                      </select>
                  </div>

                    <div class="form-group">
                        <label for="matricula"><i class="fas fa-id-card"></i> Matrícula:</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $usuario->matricula }}" required>
                    </div>

                    <div class="form-group">
                        <label for="curso"><i class="fas fa-graduation-cap"></i> Curso:</label>
                        <input type="text" class="form-control" id="curso" name="curso" value="{{ $usuario->curso }}">
                    </div>

                    <div class="form-group">
                        <label for="senha"><i class="fas fa-lock"></i> Nova Senha (opcional):</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>

                    <div class="form-group">
                        <label for="confirmSenha"><i class="fas fa-lock"></i> Confirmar Nova Senha:</label>
                        <input type="password" class="form-control" id="confirmSenha" name="confirmSenha">
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
            <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este usuário?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Excluir Usuário
                </button>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4"><i class="fas fa-sign-in-alt"></i> Login</h1>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nome_usuario"><i class="fas fa-user"></i> Nome de Usuário:</label>
                        <input type="text" id="nome_usuario" name="nome_usuario" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="senha"><i class="fas fa-lock"></i> Senha:</label>
                        <input type="password" id="senha" name="senha" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

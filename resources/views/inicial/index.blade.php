@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1><i class="fas fa-home"></i> Bem-vindo ao Sistema de Reservas</h1>
            <p class="lead">Gerencie suas reservas de equipamentos e usuários com facilidade.</p>
        </div>

        <div class="row">
            <!-- Card para Equipamentos -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-cogs fa-3x mb-3"></i>
                        <h5 class="card-title">Equipamentos</h5>
                        <p class="card-text">Visualize e gerencie todos os equipamentos disponíveis.</p>
                        <a href="{{ route('equipamentos.index') }}" class="btn btn-primary">Gerenciar Equipamentos</a>
                    </div>
                </div>
            </div>

            <!-- Card para Reservas -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-calendar-check fa-3x mb-3"></i>
                        <h5 class="card-title">Reservas</h5>
                        <p class="card-text">Faça e visualize as reservas de equipamentos.</p>
                        <a href="{{ route('reservas.index') }}" class="btn btn-primary">Gerenciar Reservas</a>
                    </div>
                </div>
            </div>

            <!-- Card para Usuários -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h5 class="card-title">Usuários</h5>
                        <p class="card-text">Gerencie os usuários que têm acesso ao sistema.</p>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Gerenciar Usuários</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <h3><i class="fas fa-info-circle"></i> Sobre o Sistema</h3>
            <p class="lead">Este sistema permite o gerenciamento eficiente de equipamentos e reservas, facilitando o processo para administradores e usuários.</p>
        </div>
    </div>

    <!-- Scripts do Bootstrap e Font Awesome -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
@endsection

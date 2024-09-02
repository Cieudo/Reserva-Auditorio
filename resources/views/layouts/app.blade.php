<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reservas</title>
    <!-- Link para o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Adicione seus próprios estilos aqui -->
    <style>
        /* Seus estilos adicionais */
        body {
            padding-top: 56px; /* Altura da navbar fixa */
        }
        .content {
            margin-top: 20px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
        }
        footer p {
            margin-bottom: 0;
            color: #6c757d;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            padding-right: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="{{ route('home') }}">Sistema de Reservas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipamentos.index') }}">Equipamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reservas.index') }}">Reservas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}">Usuários</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container content">
        @yield('content')
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

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
    <!-- Estilos personalizados -->
    <style>
        body {
            padding-top: 60px; /* Ajuste para a altura da navbar */
        }
        .navbar-custom {
            background-color: #007bff; /* Cor azul da navbar */
            border-bottom: 3px solid #0056b3; /* Borda inferior da navbar */
        }
        .navbar-custom .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-custom .navbar-brand:hover {
            color: #d9d9d9;
        }
        .navbar-custom .nav-link {
            color: white;
            padding-right: 20px;
            font-weight: 500;
        }
        .navbar-custom .nav-link:hover {
            color: #d9d9d9;
            transition: color 0.3s ease-in-out;
        }
        .navbar-custom .btn-custom {
            background-color: #0056b3;
            color: white;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
        }
        .navbar-custom .btn-custom:hover {
            background-color: #003f7f;
        }
        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            margin-top: 20px;
        }
        footer p {
            margin-bottom: 0;
            color: #6c757d;
        }
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar personalizada -->
    <nav class="navbar navbar-expand-md navbar-custom fixed-top">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-tools"></i> Sistema de Reservas
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
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
            @auth
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->nome_usuario }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-custom">Login</a>
            @endauth
        </div>
    </nav>

    <!-- Content -->
    <div class="container content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <p>&copy; 2024 Sistema de Reservas. Todos os direitos reservados.</p>
    </footer>

    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

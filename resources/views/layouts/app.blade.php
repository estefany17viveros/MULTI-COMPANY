<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Tienda')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-green: #1E7C4F;
            --light-green: #A3D9A5;
            --background-color: #A3D9A5;
            --border-radius-large: 30px;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            margin: 0;
            color: #333;
        }

        /* === HEADER del home === */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: white;
            border-radius: 0 0 var(--border-radius-large) var(--border-radius-large);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .logo a {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--primary-green);
            text-decoration: none;
            transition: color 0.3s;
        }
        .logo a:hover { color: var(--light-green); }

        .nav-menu {
            display: flex;
            gap: 20px;
        }
        .nav-menu a {
            color: var(--primary-green);
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s, transform 0.2s;
            position: relative;
        }
        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0%;
            height: 2px;
            background: var(--light-green);
            transition: width 0.3s;
        }
        .nav-menu a:hover {
            color: var(--light-green);
            transform: scale(1.05);
        }
        .nav-menu a:hover::after { width: 100%; }

        .user-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .user-actions img { cursor: pointer; transition: transform 0.3s; }
        .user-actions img:hover { transform: scale(1.2); }

        .login-button,
        .register-button {
            border: 2px solid var(--primary-green);
            border-radius: 20px;
            padding: 6px 16px;
            font-weight: bold;
            color: var(--primary-green);
            text-decoration: none;
            transition: background 0.3s, color 0.3s, transform 0.3s;
        }
        .login-button:hover,
        .register-button:hover {
            background: var(--primary-green);
            color: white;
            transform: scale(1.05);
        }

        /* === FOOTER del home === */
        footer {
            background-color: var(--primary-green);
            color: white;
            text-align: center;
            padding: 20px 0;
            border-radius: var(--border-radius-large) var(--border-radius-large) 0 0;
            margin-top: 50px;
        }
        footer a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            transition: opacity 0.3s, transform 0.3s;
        }
        footer a:hover {
            opacity: 0.8;
            transform: scale(1.05);
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- HEADER -->
    <header>
        <div class="logo">
            <a href="{{ url('/') }}">Mi Tienda</a>
        </div>
        <nav class="nav-menu">
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ route('products.index') }}">Productos</a>
            <a href="#">Ofertas</a>
            <a href="#">Contacto</a>
        </nav>
        <div class="user-actions">
            <a href="#"><img src="https://img.icons8.com/material-rounded/24/1E7C4F/search--v1.png" alt="Buscar" /></a>
            <a href="#"><img src="https://img.icons8.com/material-rounded/24/1E7C4F/shopping-cart.png" alt="Carrito" /></a>
            <a href="#" class="login-button">Login</a>
            <a href="#" class="register-button">Register</a>
        </div>
    </header>

    <!-- CONTENIDO -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; {{ date('Y') }} Mi Tienda. Todos los derechos reservados.</p>
        <p>
            <a href="#">Política de Privacidad</a> |
            <a href="#">Términos de Servicio</a> |
            <a href="#">Contacto</a>
        </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>

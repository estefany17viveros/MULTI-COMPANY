<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Tienda')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Estilos -->
    <style>
        :root {
            --primary-green: #1E7C4F;
            --dark-green: #0A5C36;
            --background-color: #f8f9fa;
            --sidebar-width: 260px;
            --sidebar-collapsed: 70px;
            --transition-speed: 0.3s;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--background-color);
            margin: 0;
            padding: 0;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-collapsed);
            background: linear-gradient(180deg, var(--primary-green), var(--dark-green));
            color: white;
            transition: all var(--transition-speed) ease;
            overflow-x: hidden;
            z-index: 1000;
        }

        .sidebar.expanded {
            width: var(--sidebar-width);
        }

        /* Header del sidebar */
        .sidebar-header {
            text-align: center;
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all var(--transition-speed) ease;
        }

        .sidebar.expanded .user-avatar {
            width: 80px;
            height: 80px;
        }

        .user-info {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: all var(--transition-speed) ease;
        }

        .sidebar.expanded .user-info {
            opacity: 1;
            max-height: 100px;
            margin-top: 10px;
        }

        /* Botón de toggle */
        .sidebar-toggle {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
        }

        .sidebar.expanded .sidebar-toggle {
            transform: rotate(180deg);
        }

        /* Navegación */
        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.85);
            padding: 12px 15px;
            border-radius: 8px;
            margin: 5px 10px;
            transition: all var(--transition-speed) ease;
            text-decoration: none;
        }

        .sidebar .nav-link i {
            min-width: 25px;
            font-size: 18px;
        }

        .nav-text {
            opacity: 0;
            transition: opacity var(--transition-speed) ease;
            white-space: nowrap;
        }

        .sidebar.expanded .nav-text {
            opacity: 1;
            margin-left: 10px;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateX(5px);
        }

        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.25);
            font-weight: bold;
        }
/* Cuando pasamos el cursor encima se expande */
.sidebar:hover {
    width: var(--sidebar-width);
}   

/* Avatar */
.user-avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    border: 2px solid rgba(255, 255, 255, 0.3);
    transition: all var(--transition-speed) ease;
}

.sidebar:hover .user-avatar {
    width: 80px;
    height: 80px;
}

/* Info del usuario */
.user-info {
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    transition: all var(--transition-speed) ease;
}

.sidebar:hover .user-info {
    opacity: 1;
    max-height: 100px;
    margin-top: 10px;
}

/* Navegación */
.sidebar .nav-link {
    display: flex;
    align-items: center;
    color: rgba(255, 255, 255, 0.85);
    padding: 12px 15px;
    border-radius: 8px;
    margin: 5px 10px;
    transition: all var(--transition-speed) ease;
    text-decoration: none;
}

.sidebar .nav-link i {
    min-width: 25px;
    font-size: 18px;
}

/* Ocultamos el texto por defecto */
.nav-text {
    opacity: 0;
    transition: opacity var(--transition-speed) ease;
    white-space: nowrap;
}

/* Al hacer hover en el sidebar se muestra */
.sidebar:hover .nav-text {
    opacity: 1;
    margin-left: 10px;
}

/* Hover y activo */
.sidebar .nav-link:hover {
    background: rgba(255, 255, 255, 0.15);
    color: white;
    transform: translateX(5px);
}

.sidebar .nav-link.active {
    background: rgba(255, 255, 255, 0.25);
    font-weight: bold;
}
        /* Footer del sidebar */
        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Contenido */
        .main-content {
            margin-left: var(--sidebar-collapsed);
            padding: 20px;
            transition: margin-left var(--transition-speed) ease;
        }

        .sidebar.expanded ~ .main-content {
            margin-left: var(--sidebar-width);
        }
/* Main Content (se ajusta al sidebar) */
.main-content {
    margin-left: var(--sidebar-collapsed);
    transition: margin-left var(--transition-speed) ease;
    padding: 20px;
}

.sidebar:hover ~ .main-content {
    margin-left: var(--sidebar-width);
}

        /* Header */
        header {
            background: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        header .logo a {
            font-size: 22px;
            font-weight: bold;
            color: var(--primary-green);
            text-decoration: none;
        }

        header .nav-menu a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
        }

        header .nav-menu a:hover {
            color: var(--primary-green);
        }

        header .user-actions a {
            margin-left: 15px;
            text-decoration: none;
            color: var(--primary-green);
        }

        .login-button, .register-button {
            padding: 5px 12px;
            border-radius: 6px;
            border: 1px solid var(--primary-green);
        }

        .login-button {
            background: white;
        }

        .register-button {
            background: var(--primary-green);
            color: white;
        }
.footer {
  background: linear-gradient(135deg, #064e3b, #10b981);
  color: white;
  padding: 40px 20px 20px;
  margin-top: 40px;
}

.footer-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 25px;
  max-width: 1200px;
  margin: auto;
}

.footer-card {
  background: rgba(255, 255, 255, 0.1);
  padding: 20px;
  border-radius: 15px;
  backdrop-filter: blur(6px);
  transition: transform 0.3s ease, background 0.3s ease;
}

.footer-card:hover {
  transform: translateY(-8px);
  background: rgba(255, 255, 255, 0.2);
}

.footer-card h3 {
  margin-bottom: 12px;
  font-size: 18px;
  font-weight: bold;
  color: #d1fae5;
}

.footer-card p, 
.footer-card ul {
  font-size: 14px;
  line-height: 1.6;
  color: #f0fdf4;
}

.footer-card ul {
  list-style: none;
  padding: 0;
}

.footer-card ul li {
  margin-bottom: 6px;
}

.footer-card ul li a {
  text-decoration: none;
  color: #bbf7d0;
  transition: color 0.3s;
}

.footer-card ul li a:hover {
  color: white;
}

.social-icons {
  margin-top: 12px;
}

.social-icons a {
  display: inline-block;
  margin-right: 12px;
  font-size: 18px;
  color: #bbf7d0;
  transition: transform 0.3s ease, color 0.3s ease;
}

.social-icons a:hover {
  transform: scale(1.2);
  color: white;
}

.footer-bottom {
  text-align: center;
  margin-top: 30px;
  font-size: 14px;
  border-top: 1px solid rgba(255,255,255,0.2);
  padding-top: 15px;
  color: #d1fae5;
}

    </style>

    @stack('styles')
</head>
<body>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <button class="sidebar-toggle"><i class="fas fa-chevron-right"></i></button>
            <img src="https://ui-avatars.com/api/?name=Empresa+XYZ&background=ffffff&color=1E7C4F&size=80" class="user-avatar">
            <div class="user-info">
                <h5 class="mb-0">Empresa XYZ</h5>
                <small class="text-white-50">Administrador</small>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a class="nav-link" href="products"><i class="fas fa-tachometer-alt"></i><span class="nav-text">Productos</span></a></li>
                <li><a class="nav-link active" href="#"><i class="fas fa-boxes"></i><span class="nav-text">Almacenes</span></a></li>
                <li><a class="nav-link" href="empresa"><i class="fas fa-building"></i><span class="nav-text">Empresas</span></a></li>
                <li><a class="nav-link" href="inventario"><i class="fas fa-file-invoice"></i><span class="nav-text">Inventario</span></a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-code-branch"></i><span class="nav-text">Sucursales</span></a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-users"></i><span class="nav-text">Usuario</span></a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-cog"></i><span class="nav-text">Configuración</span></a></li>
            </ul>
        </nav>
        <div class="sidebar-footer">
            <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i><span class="nav-text">Cerrar Sesión</span></a>
        </div>
    </div>

    <!-- Main -->
    <div class="main-content">
     
        <main class="container py-4">
            @yield('content')
        </main>

        <!-- Footer -->
<footer class="footer">
  <div class="footer-container">
    
    <!-- Card 1 -->
    <div class="footer-card">
      <h3>🌱 Sistema de Gestión</h3>
      <p>Plataforma para la administración eficiente de empresas con herramientas modernas y seguras.</p>
    </div>

    <!-- Card 2 -->
    <div class="footer-card">
      <h3>📌 Enlaces rápidos</h3>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Servicios</a></li>
        <li><a href="#">Términos de uso</a></li>
        <li><a href="#">Política de privacidad</a></li>
      </ul>
    </div>

    <!-- Card 3 -->
    <div class="footer-card">
      <h3>📞 Contacto</h3>
      <p>Email: soporte@empresa.com</p>
      <p>Tel: +57 321 456 7890</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
    
  </div>

  <div class="footer-bottom">
    © 2025 Sistema de Gestión de Empresas - Todos los derechos reservados
  </div>
</footer>
    </div>

    <script>
        // Sidebar toggle
        document.querySelector(".sidebar-toggle").addEventListener("click", function() {
            document.querySelector(".sidebar").classList.toggle("expanded");
            document.querySelector(".main-content").classList.toggle("expanded");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>

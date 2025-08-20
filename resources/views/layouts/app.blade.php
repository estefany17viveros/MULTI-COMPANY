<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multicompany</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            padding: 10px 20px;
            transition: 0.3s;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: #495057;
            color: white;
            border-radius: 5px;
        }
        .main-content {
            padding: 20px;
        }
        .floating {
            color: white;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-lg-2 sidebar">
                <div class="text-center mb-4 mt-3 floating">
                    <h4><i class="fas fa-warehouse me-2"></i>Multicompany</h4>
                    <p class="small">Sistema de gestión</p>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @yield('dashboard_active')" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('warehouses_active')" href="{{ route('warehouses.index') }}">
                            <i class="fas fa-warehouse me-2"></i> Almacenes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('companies_active')" href="{{ route('companies.index') }}">
                            <i class="fas fa-building me-2"></i> Empresas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('branches_active')" href="{{ route('branches.index') }}">
                            <i class="fas fa-code-branch me-2"></i> Sucursales
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('inventory_active')" href="{{ route('inventory.index') }}">
                            <i class="fas fa-boxes me-2"></i> Inventario
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('requests_active')" href="{{ route('requests.index') }}">
                            <i class="fas fa-shopping-cart me-2"></i> Solicitudes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('settings_active')" href="{{ route('settings') }}">
                            <i class="fas fa-cog me-2"></i> Configuración
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a class="nav-link" href="{{ route('logout') }}">
                            <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 main-content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
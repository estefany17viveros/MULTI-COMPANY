<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #059669;
            --dark-green: #065f46;
            --medium-green: #047857;
            --light-green: #10b981;
            --lighter-green: #d1fae5;
            --background-green: #ecfdf5;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--medium-green) 50%, var(--dark-green) 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Elementos flotantes decorativos */
        .floating-element {
            position: absolute;
            border-radius: 50%;
            opacity: 0.15;
            z-index: 0;
            animation: floating 8s ease-in-out infinite;
        }
        
        .floating-element:nth-child(1) {
            width: 120px;
            height: 120px;
            background: var(--lighter-green);
            top: 5%;
            left: 5%;
            animation-delay: 0s;
        }
        
        .floating-element:nth-child(2) {
            width: 80px;
            height: 80px;
            background: var(--light-green);
            top: 15%;
            right: 10%;
            animation-delay: 1s;
        }
        
        .floating-element:nth-child(3) {
            width: 60px;
            height: 60px;
            background: var(--primary-green);
            bottom: 20%;
            left: 15%;
            animation-delay: 2s;
        }
        
        .floating-element:nth-child(4) {
            width: 100px;
            height: 100px;
            background: var(--medium-green);
            bottom: 10%;
            right: 5%;
            animation-delay: 3s;
        }
        
        .main-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .sidebar {
            background: linear-gradient(135deg, var(--light-green), var(--primary-green), var(--medium-green));
            color: white;
            padding-top: 20px;
            height: 100%;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.9);
            padding: 12px 20px;
            margin: 4px 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateX(5px);
        }
        
        .sidebar .nav-link.active {
            background-color: white;
            color: var(--dark-green);
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        
        .main-content {
            padding: 20px;
            background-color: var(--background-green);
            min-height: 100vh;
        }
        
        .header {
            background: linear-gradient(135deg, var(--light-green), var(--primary-green));
            color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
        }
        
        .inventory-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .inventory-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--lighter-green), #f0fdf4);
            border-bottom: 2px solid var(--light-green);
            font-weight: 600;
            padding: 15px 20px;
            color: var(--dark-green);
        }
        
        .table th {
            font-weight: 600;
            color: var(--dark-green);
            background-color: var(--lighter-green);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--light-green), var(--primary-green));
            border: none;
            border-radius: 12px;
            font-weight: 600;
            padding: 10px 20px;
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-green), var(--medium-green));
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(16, 185, 129, 0.4);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border: none;
            border-radius: 8px;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border: none;
            border-radius: 8px;
        }
        
        .btn-info {
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            border: none;
            border-radius: 8px;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-active {
            background-color: rgba(39, 174, 96, 0.2);
            color: #166534;
        }
        
        .status-inactive {
            background-color: rgba(231, 76, 60, 0.2);
            color: #991b1b;
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box input {
            padding-left: 40px;
            border-radius: 12px;
            border: 2px solid var(--lighter-green);
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 10px;
            color: var(--medium-green);
        }
        
        .company-selector {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            border: 2px solid #bbf7d0;
        }
        
        .action-buttons .btn {
            margin-left: 5px;
            border-radius: 8px;
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--light-green), var(--primary-green));
            color: white;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--light-green);
            box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.25);
        }
        
        .pagination .page-item .page-link {
            color: var(--dark-green);
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--light-green);
            border-color: var(--light-green);
            color: white;
        }
        
        .user-avatar {
            border: 3px solid rgba(255, 255, 255, 0.3);
        }
        
        .inventory-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 15px;
            width: 23%;
            min-width: 200px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            text-align: center;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
        }
        
        .stat-card h5 {
            color: var(--dark-green);
            font-size: 1rem;
            margin-bottom: 10px;
        }
        
        .stat-card .value {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--primary-green);
        }
        
        .stat-card i {
            font-size: 2rem;
            color: var(--light-green);
            margin-bottom: 10px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                margin-bottom: 20px;
                border-radius: 15px;
            }
            
            .main-content {
                padding: 15px;
            }
            
            .stat-card {
                width: 100%;
            }
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .inventory-card, .header, .company-selector, .stat-card {
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Floating animation */
        @keyframes floating {
            0% { transform: translate(0, 0px) rotate(0deg); }
            50% { transform: translate(0, 15px) rotate(5deg); }
            100% { transform: translate(0, -0px) rotate(0deg); }
        }
        
        /* Filtros de inventario */
        .inventory-filters {
            background: white;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }
        
        /* Tabla con efecto hover */
        .table-hover tbody tr:hover {
            background-color: rgba(16, 185, 129, 0.1);
        }
        
        /* Badge para niveles de stock */
        .stock-low {
            background-color: #fee2e2;
            color: #b91c1c;
        }
        
        .stock-medium {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .stock-high {
            background-color: #d1fae5;
            color: #065f46;
        }
    </style>
</head>
<body>
    <!-- Elementos flotantes decorativos -->
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    
    <div class="main-container">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-lg-2">
                <div class="sidebar">
                    <div class="text-center p-4">
                        <img src="https://ui-avatars.com/api/?name=Empresa+XYZ&background=10b981&color=fff&size=80" 
                             alt="Logo" class="img-fluid rounded-circle user-avatar">
                        <h5 class="mt-3">Empresa XYZ</h5>
                        <p class="text-white-50">Administrador</p>
                    </div>
                    <hr class="mx-3 my-2 bg-white">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-boxes me-2"></i> Inventario
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-building me-2"></i> Empresas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-file-invoice me-2"></i> Reportes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-users me-2"></i> Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-cog me-2"></i> Configuración
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="#">
                                <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Contenido Principal -->
            <div class="col-lg-10">
                <div class="main-content">
                    <!-- Header -->
                    <div class="header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2><i class="fas fa-boxes me-2"></i> Sistema de Inventario</h2>
                                <p class="mb-0">Gestiona y controla tu inventario de forma eficiente</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="search-box me-3">
                                    <i class="fas fa-search"></i>
                                    <input type="text" class="form-control" placeholder="Buscar en inventario...">
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-bell"></i>
                                        <span class="badge bg-danger">3</span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Producto con stock bajo</a></li>
                                        <li><a class="dropdown-item" href="#">Nuevo ingreso de mercancía</a></li>
                                        <li><a class="dropdown-item" href="#">Producto próximo a vencer</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Selector de empresa -->
                    <div class="company-selector">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0"><i class="fas fa-building me-2"></i> Empresa Actual</h5>
                                <p class="mb-0">Selecciona la empresa cuyo inventario deseas gestionar</p>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option selected>Empresa XYZ (Sede Central)</option>
                                    <option>Empresa ABC (Sucursal Norte)</option>
                                    <option>Comercializadora 123 (Sucursal Sur)</option>
                                    <option>Distribuidora Global (Almacén Este)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Estadísticas -->
                    <div class="inventory-stats">
                        <div class="stat-card">
                            <i class="fas fa-box"></i>
                            <h5>Total de Productos</h5>
                            <div class="value">1,248</div>
                        </div>
                        <div class="stat-card">
                            <i class="fas fa-exclamation-triangle"></i>
                            <h5>Stock Bajo</h5>
                            <div class="value">37</div>
                        </div>
                        <div class="stat-card">
                            <i class="fas fa-tags"></i>
                            <h5>Categorías</h5>
                            <div class="value">24</div>
                        </div>
                        <div class="stat-card">
                            <i class="fas fa-sync-alt"></i>
                            <h5>Rotación Mensual</h5>
                            <div class="value">18.5%</div>
                        </div>
                    </div>
                    
                    <!-- Filtros -->
                    <div class="inventory-filters">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <select class="form-select">
                                    <option selected>Todas las categorías</option>
                                    <option>Electrónica</option>
                                    <option>Ropa</option>
                                    <option>Alimentos</option>
                                    <option>Hogar</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <select class="form-select">
                                    <option selected>Todo el inventario</option>
                                    <option>Stock bajo</option>
                                    <option>Stock medio</option>
                                    <option>Stock alto</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <select class="form-select">
                                    <option selected>Ordenar por: Nombre</option>
                                    <option>Ordenar por: Precio</option>
                                    <option>Ordenar por: Stock</option>
                                    <option>Ordenar por: Fecha</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2 text-end">
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i> Nuevo Producto
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tabla de inventario -->
                    <div class="card inventory-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-list me-2"></i> Lista de Productos en Inventario</span>
                            <span class="badge bg-primary">Mostrando 10 de 1,248 productos</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Producto</th>
                                            <th>Categoría</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                            <th>Estado</th>
                                            <th>Ubicación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#INV-001</td>
                                            <td>Laptop EliteBook 850</td>
                                            <td>Electrónica</td>
                                            <td>$1,250.00</td>
                                            <td>
                                                <span class="badge stock-low">12 unidades</span>
                                            </td>
                                            <td><span class="badge status-active">Activo</span></td>
                                            <td>Estante A-12</td>
                                            <td class="action-buttons">
                                                <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#INV-002</td>
                                            <td>Mouse Inalámbrico Pro</td>
                                            <td>Electrónica</td>
                                            <td>$45.99</td>
                                            <td>
                                                <span class="badge stock-high">245 unidades</span>
                                            </td>
                                            <td><span class="badge status-active">Activo</span></td>
                                            <td>Estante B-03</td>
                                            <td class="action-buttons">
                                                <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#INV-003</td>
                                            <td>Teclado Mecánico RGB</td>
                                            <td>Electrónica</td>
                                            <td>$89.50</td>
                                            <td>
                                                <span class="badge stock-medium">54 unidades</span>
                                            </td>
                                            <td><span class="badge status-active">Activo</span></td>
                                            <td>Estante A-07</td>
                                            <td class="action-buttons">
                                                <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#INV-004</td>
                                            <td>Monitor 24" Full HD</td>
                                            <td>Electrónica</td>
                                            <td>$320.00</td>
                                            <td>
                                                <span class="badge stock-low">8 unidades</span>
                                            </td>
                                            <td><span class="badge status-active">Activo</span></td>
                                            <td>Estante C-15</td>
                                            <td class="action-buttons">
                                                <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#INV-005</td>
                                            <td>Auriculares Bluetooth</td>
                                            <td>Electrónica</td>
                                            <td>$75.00</td>
                                            <td>
                                                <span class="badge stock-high">187 unidades</span>
                                            </td>
                                            <td><span class="badge status-inactive">Inactivo</span></td>
                                            <td>Estante D-22</td>
                                            <td class="action-buttons">
                                                <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Paginación -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Siguiente</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efectos de animación para las tarjetas
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.inventory-card, .stat-card');
            
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
            
            // Simular notificaciones
            const notificationBadge = document.querySelector('.badge.bg-danger');
            if (notificationBadge) {
                setInterval(() => {
                    notificationBadge.classList.toggle('bg-danger');
                    notificationBadge.classList.toggle('bg-warning');
                }, 2000);
            }
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Almacenes - Sistema Multicompany</title>
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
        }
        
        .main-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 1400px;
            margin: 0 auto;
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
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
            overflow: hidden;
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
        
        @media (max-width: 768px) {
            .sidebar {
                margin-bottom: 20px;
                border-radius: 15px;
            }
            
            .main-content {
                padding: 15px;
            }
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .card, .header, .company-selector {
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Floating elements animation */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, 8px); }
            100% { transform: translate(0, -0px); }
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
                        <a class="nav-link" href="#">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-warehouse me-2"></i> Almacenes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="empresa">
                            <i class="fas fa-building me-2"></i> Empresas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-code-branch me-2"></i> Sucursales
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inventario">
                            <i class="fas fa-boxes me-2"></i> Inventario
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-shopping-cart me-2"></i> Solicitudes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="configuracion">
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

            <!-- Main Content -->
            <div class="col-lg-10 main-content">
                <div class="header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2><i class="fas fa-warehouse me-2"></i>Gestión de Almacenes</h2>
                            <p class="mb-0">Administra los almacenes de tu empresa</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="me-3">Hola, Admin</span>
                            <img src="https://ui-avatars.com/api/?name=Admin&background=ffffff&color=059669" class="rounded-circle user-avatar" width="45" height="45">
                        </div>
                    </div>
                </div>

                <!-- Company Selector -->
                <div class="company-selector">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="companySelect" class="form-label">Seleccionar Empresa:</label>
                            <select class="form-select" id="companySelect">
                                <option selected>Todas las empresas</option>
                                <option value="1">Empresa A</option>
                                <option value="2">Empresa B</option>
                                <option value="3">Empresa C</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="branchSelect" class="form-label">Filtrar por Sucursal:</label>
                            <select class="form-select" id="branchSelect">
                                <option selected>Todas las sucursales</option>
                                <option value="1">Sucursal Norte</option>
                                <option value="2">Sucursal Sur</option>
                                <option value="3">Sucursal Este</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Actions Bar -->
                <div class="d-flex justify-content-between mb-4">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" placeholder="Buscar almacén..." id="searchInput">
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWarehouseModal">
                        <i class="fas fa-plus me-1"></i> Nuevo Almacén
                    </button>
                </div>

                <!-- Warehouses Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-list me-2"></i>Lista de Almacenes</span>
                        <span class="badge bg-primary">5 registros</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Empresa</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>WH001</td>
                                        <td>Almacén Central</td>
                                        <td>Empresa A</td>
                                        <td>Av. Principal 123</td>
                                        <td>+123456789</td>
                                        <td>central@empresa.com</td>
                                        <td><span class="status-badge status-active">Activo</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>WH002</td>
                                        <td>Almacén Norte</td>
                                        <td>Empresa A</td>
                                        <td>Calle Norte 456</td>
                                        <td>+123456780</td>
                                        <td>norte@empresa.com</td>
                                        <td><span class="status-badge status-active">Activo</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>WH003</td>
                                        <td>Almacén Sur</td>
                                        <td>Empresa B</td>
                                        <td>Av. Sur 789</td>
                                        <td>+123456781</td>
                                        <td>sur@empresa.com</td>
                                        <td><span class="status-badge status-inactive">Inactivo</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>WH004</td>
                                        <td>Bodega Este</td>
                                        <td>Empresa C</td>
                                        <td>Carrera Este 101</td>
                                        <td>+123456782</td>
                                        <td>este@empresa.com</td>
                                        <td><span class="status-badge status-active">Activo</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>WH005</td>
                                        <td>Bodega Oeste</td>
                                        <td>Empresa C</td>
                                        <td>Diagonal Oeste 202</td>
                                        <td>+123456783</td>
                                        <td>oeste@empresa.com</td>
                                        <td><span class="status-badge status-active">Activo</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Anterior</a>
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

    <!-- Add Warehouse Modal -->
    <div class="modal fade" id="addWarehouseModal" tabindex="-1" aria-labelledby="addWarehouseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addWarehouseModalLabel"><i class="fas fa-plus me-2"></i>Agregar Nuevo Almacén</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="warehouseForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="company_id" class="form-label">Empresa</label>
                                <select class="form-select" id="company_id" name="company_id" required>
                                    <option value="">Seleccionar empresa</option>
                                    <option value="1">Empresa A</option>
                                    <option value="2">Empresa B</option>
                                    <option value="3">Empresa C</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nombre del Almacén</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Dirección</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Almacén activo
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="saveWarehouse">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('tbody tr');
            
            searchInput.addEventListener('keyup', function() {
                const searchText = this.value.toLowerCase();
                
                tableRows.forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    if (rowText.indexOf(searchText) !== -1) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
            
            // Filter by company
            const companySelect = document.getElementById('companySelect');
            const branchSelect = document.getElementById('branchSelect');
            
            companySelect.addEventListener('change', filterTable);
            branchSelect.addEventListener('change', filterTable);
            
            function filterTable() {
                const companyValue = companySelect.value;
                const branchValue = branchSelect.value;
                
                tableRows.forEach(row => {
                    const companyCell = row.cells[2].textContent;
                    const shouldShow = 
                        (companyValue === "Todas las empresas" || companyCell.includes(companySelect.options[companySelect.selectedIndex].text)) &&
                        (branchValue === "Todas las sucursales" || true); // Simplified for demo
                    
                    row.style.display = shouldShow ? '' : 'none';
                });
            }
            
            // Save warehouse form
            document.getElementById('saveWarehouse').addEventListener('click', function() {
                const form = document.getElementById('warehouseForm');
                if (form.checkValidity()) {
                    // Simulate form submission
                    alert('Almacén guardado con éxito!');
                    const modal = bootstrap.Modal.getInstance(document.getElementById('addWarehouseModal'));
                    modal.hide();
                    form.reset();
                } else {
                    form.reportValidity();
                }
            });
            
            // Add event listeners to action buttons
            const actionButtons = document.querySelectorAll('.action-buttons button');
            actionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const action = this.querySelector('i').className;
                    const warehouseName = this.closest('tr').cells[1].textContent;
                    
                    if (action.includes('eye')) {
                        alert(`Ver detalles de: ${warehouseName}`);
                    } else if (action.includes('edit')) {
                        alert(`Editar: ${warehouseName}`);
                    } else if (action.includes('trash')) {
                        if (confirm(`¿Está seguro de eliminar ${warehouseName}?`)) {
                            alert(`${warehouseName} eliminado`);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
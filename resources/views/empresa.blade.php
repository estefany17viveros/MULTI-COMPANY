<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Empresas - Sistema Administrativo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #059669;
            --dark-green: #065f46;
            --medium-green: #047857;
            --light-green: #10b981;
            --lighter-green: #d1fae5;
            --background-green: #ecfdf5;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --white: #ffffff;
            --border-light: #e5e7eb;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --header-height: 80px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--background-green);
            color: var(--text-dark);
            min-height: 100vh;
            line-height: 1.6;
        }
        
        /* Header */
        .header {
            height: var(--header-height);
            background: linear-gradient(135deg, var(--dark-green), var(--primary-green));
            color: var(--white);
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo-icon {
            font-size: 32px;
            color: var(--white);
            background: rgba(255, 255, 255, 0.15);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo h1 {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--light-green), var(--primary-green));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 18px;
            color: var(--white);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        
        /* Main Content */
        .main-content {
            max-width: 1600px;
            margin: 40px auto;
            padding: 0 30px;
        }
        
        .page-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--lighter-green);
        }
        
        .page-title h2 {
            color: var(--dark-green);
            font-size: 32px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
            letter-spacing: -0.5px;
        }
        
        .page-title h2 i {
            color: var(--primary-green);
            background: var(--lighter-green);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Stats Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .stat-card {
            background: var(--white);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            border-left: 5px solid var(--primary-green);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: var(--lighter-green);
            border-radius: 50%;
            transform: translate(30%, -30%);
            opacity: 0.5;
            z-index: 0;
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--light-green), var(--primary-green));
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-right: 20px;
            position: relative;
            z-index: 1;
            box-shadow: 0 8px 20px rgba(5, 150, 105, 0.25);
        }
        
        .stat-info h3 {
            font-size: 32px;
            margin-bottom: 8px;
            color: var(--dark-green);
            font-weight: 700;
        }
        
        .stat-info p {
            color: var(--text-light);
            font-size: 16px;
            font-weight: 500;
        }
        
        /* Filters */
        .filters {
            background-color: var(--white);
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 40px;
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            align-items: center;
        }
        
        .filter-group {
            flex: 1;
            min-width: 220px;
        }
        
        .filter-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--text-light);
            font-weight: 500;
            font-size: 14px;
        }
        
        .filter-group input, .filter-group select {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid var(--border-light);
            border-radius: 12px;
            font-size: 15px;
            background-color: var(--white);
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        
        .filter-group input:focus, .filter-group select:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.2);
        }
        
        .search-bar {
            display: flex;
            align-items: center;
            background-color: var(--white);
            border-radius: 12px;
            padding: 5px 18px;
            width: 100%;
            max-width: 400px;
            border: 1px solid var(--border-light);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }
        
        .search-bar:focus-within {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.2);
        }
        
        .search-bar input {
            border: none;
            background: transparent;
            padding: 12px;
            width: 100%;
            outline: none;
            font-size: 15px;
        }
        
        /* Main Card */
        .main-card {
            background-color: var(--white);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }
        
        .main-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--light-green), var(--primary-green));
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .card-header h2 {
            color: var(--dark-green);
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        /* Table */
        .table-responsive {
            overflow-x: auto;
            border-radius: 14px;
            border: 1px solid var(--border-light);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        }
        
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        th, td {
            padding: 18px 24px;
            text-align: left;
            border-bottom: 1px solid var(--border-light);
        }
        
        th {
            background-color: var(--lighter-green);
            color: var(--dark-green);
            font-weight: 600;
            position: sticky;
            top: 0;
            white-space: nowrap;
        }
        
        tr {
            transition: background-color 0.2s;
        }
        
        tr:hover {
            background-color: var(--background-green);
        }
        
        .status {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            min-width: 110px;
            justify-content: center;
        }
        
        .status.active {
            background-color: var(--lighter-green);
            color: var(--success);
        }
        
        .status.inactive {
            background-color: #fee2e2;
            color: var(--error);
        }
        
        .status.pending {
            background-color: #fef3c7;
            color: var(--warning);
        }
        
        .status i {
            font-size: 12px;
        }
        
        .actions {
            display: flex;
            gap: 12px;
        }
        
        .btn {
            padding: 12px 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-view {
            background: linear-gradient(135deg, var(--light-green), var(--primary-green));
            color: var(--white);
        }
        
        .btn-edit {
            background: linear-gradient(135deg, #fbbf24, var(--warning));
            color: var(--white);
        }
        
        .btn-delete {
            background: linear-gradient(135deg, #f87171, var(--error));
            color: var(--white);
        }
        
        .btn-add {
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
            color: var(--white);
            padding: 14px 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(5, 150, 105, 0.3);
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--dark-green), var(--primary-green));
            color: var(--white);
            padding: 30px 40px;
            text-align: center;
            margin-top: 60px;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 25px;
        }
        
        .footer-links {
            display: flex;
            gap: 25px;
        }
        
        .footer-links a {
            color: var(--white);
            text-decoration: none;
            transition: opacity 0.3s;
            font-weight: 500;
        }
        
        .footer-links a:hover {
            opacity: 0.8;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .stat-card, .main-card {
            animation: fadeIn 0.6s ease-out;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .stats-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 900px) {
            .header {
                padding: 0 25px;
            }
            
            .main-content {
                padding: 0 20px;
            }
            
            .page-title h2 {
                font-size: 28px;
            }
        }
        
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                height: auto;
                padding: 20px;
            }
            
            .user-info {
                margin-top: 15px;
            }
            
            .stats-cards {
                grid-template-columns: 1fr;
            }
            
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .search-bar {
                max-width: 100%;
            }
            
            th, td {
                padding: 14px 16px;
            }
            
            .footer-content {
                flex-direction: column;
                text-align: center;
            }
            
            .footer-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
        
        @media (max-width: 576px) {
            .filters {
                flex-direction: column;
            }
            
            .filter-group {
                width: 100%;
            }
            
            .actions {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .page-title {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            
            .page-title h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-building"></i>
            </div>
            <h1>Gestión de Empresas</h1>
        </div>
        <div class="user-info">
            <span>Administrador</span>
            <div class="user-avatar">A</div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="main-content">
        <div class="page-title">
            <h2><i class="fas fa-list"></i> Listado de Empresas Registradas</h2>
            <button class="btn btn-add">
                <i class="fas fa-plus"></i> Nueva Empresa
            </button>
        </div>
        
        <!-- Stats Cards -->
        <div class="stats-cards">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-building"></i>
                </div>
                <div class="stat-info">
                    <h3>156</h3>
                    <p>Empresas Totales</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>132</h3>
                    <p>Empresas Activas</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-pause-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>18</h3>
                    <p>Empresas Inactivas</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-info">
                    <h3>14</h3>
                    <p>Nuevas este mes</p>
                </div>
            </div>
        </div>
        
        <!-- Filters -->
        <div class="filters">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Buscar empresa por nombre, RUC o contacto...">
            </div>
            
            <div class="filter-group">
                <label for="sectorFilter">Rubro</label>
                <select id="sectorFilter">
                    <option value="">Todos los rubros</option>
                    <option value="import">Importación</option>
                    <option value="export">Exportación</option>
                    <option value="tech">Tecnología</option>
                    <option value="food">Alimentación</option>
                    <option value="construction">Construcción</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="statusFilter">Estado</label>
                <select id="statusFilter">
                    <option value="">Todos los estados</option>
                    <option value="active">Activo</option>
                    <option value="inactive">Inactivo</option>
                    <option value="pending">Pendiente</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="dateFilter">Fecha de registro</label>
                <input type="date" id="dateFilter">
            </div>
        </div>
        
        <!-- Main Card -->
        <div class="main-card">
            <div class="card-header">
                <h2>Empresas Registradas en el Sistema</h2>
                <div>
                    <button class="btn">
                        <i class="fas fa-file-export"></i> Exportar
                    </button>
                    <button class="btn">
                        <i class="fas fa-print"></i> Imprimir
                    </button>
                </div>
            </div>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>RUC</th>
                            <th>Rubro</th>
                            <th>Contacto</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Importaciones Andinas S.A.</td>
                            <td>20100066679</td>
                            <td>Importación</td>
                            <td>Carlos Mendoza</td>
                            <td>987654321</td>
                            <td><span class="status active"><i class="fas fa-circle"></i> Activa</span></td>
                            <td class="actions">
                                <button class="btn btn-view"><i class="fas fa-eye"></i> Ver</button>
                                <button class="btn btn-edit"><i class="fas fa-edit"></i> Editar</button>
                                <button class="btn btn-delete"><i class="fas fa-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Distribuidora Norte SAC</td>
                            <td>20445578901</td>
                            <td>Distribución</td>
                            <td>Ana Torres</td>
                            <td>987123456</td>
                            <td><span class="status active"><i class="fas fa-circle"></i> Activa</span></td>
                            <td class="actions">
                                <button class="btn btn-view"><i class="fas fa-eye"></i> Ver</button>
                                <button class="btn btn-edit"><i class="fas fa-edit"></i> Editar</button>
                                <button class="btn btn-delete"><i class="fas fa-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Tecnología Avanzada E.I.R.L.</td>
                            <td>20567893451</td>
                            <td>Tecnología</td>
                            <td>Roberto Silva</td>
                            <td>976543218</td>
                            <td><span class="status inactive"><i class="fas fa-circle"></i> Inactiva</span></td>
                            <td class="actions">
                                <button class="btn btn-view"><i class="fas fa-eye"></i> Ver</button>
                                <button class="btn btn-edit"><i class="fas fa-edit"></i> Editar</button>
                                <button class="btn btn-delete"><i class="fas fa-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Alimentos Saludables Perú</td>
                            <td>20678912345</td>
                            <td>Alimentación</td>
                            <td>María López</td>
                            <td>934567890</td>
                            <td><span class="status active"><i class="fas fa-circle"></i> Activa</span></td>
                            <td class="actions">
                                <button class="btn btn-view"><i class="fas fa-eye"></i> Ver</button>
                                <button class="btn btn-edit"><i class="fas fa-edit"></i> Editar</button>
                                <button class="btn btn-delete"><i class="fas fa-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Construcciones Moderna S.A.C.</td>
                            <td>20789123456</td>
                            <td>Construcción</td>
                            <td>Jorge Díaz</td>
                            <td>965432187</td>
                            <td><span class="status pending"><i class="fas fa-clock"></i> Pendiente</span></td>
                            <td class="actions">
                                <button class="btn btn-view"><i class="fas fa-eye"></i> Ver</button>
                                <button class="btn btn-edit"><i class="fas fa-edit"></i> Editar</button>
                                <button class="btn btn-delete"><i class="fas fa-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Exportaciones del Sur E.I.R.L.</td>
                            <td>20891234567</td>
                            <td>Exportación</td>
                            <td>Lucía Ramos</td>
                            <td>954321876</td>
                            <td><span class="status active"><i class="fas fa-circle"></i> Activa</span></td>
                            <td class="actions">
                                <button class="btn btn-view"><i class="fas fa-eye"></i> Ver</button>
                                <button class="btn btn-edit"><i class="fas fa-edit"></i> Editar</button>
                                <button class="btn btn-delete"><i class="fas fa-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Inversiones Capital Seguro S.A.</td>
                            <td>20912345678</td>
                            <td>Finanzas</td>
                            <td>Miguel Ángel Castro</td>
                            <td>943218765</td>
                            <td><span class="status active"><i class="fas fa-circle"></i> Activa</span></td>
                            <td class="actions">
                                <button class="btn btn-view"><i class="fas fa-eye"></i> Ver</button>
                                <button class="btn btn-edit"><i class="fas fa-edit"></i> Editar</button>
                                <button class="btn btn-delete"><i class="fas fa-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div>© 2023 Sistema de Gestión de Empresas - Todos los derechos reservados</div>
            <div class="footer-links">
                <a href="#">Términos de uso</a>
                <a href="#">Política de privacidad</a>
                <a href="#">Soporte técnico</a>
                <a href="#">Contacto</a>
            </div>
        </div>
    </footer>
</body>
</html>
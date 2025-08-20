<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Multicompany - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="30" r="1.5" fill="rgba(255,255,255,0.08)"/><circle cx="40" cy="70" r="1" fill="rgba(255,255,255,0.06)"/><circle cx="90" cy="80" r="2.5" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="60" r="1.2" fill="rgba(255,255,255,0.07)"/><circle cx="70" cy="10" r="1.8" fill="rgba(255,255,255,0.09)"/></svg>');
            animation: float 20s infinite linear;
            pointer-events: none;
        }

        @keyframes float {
            0% { transform: translateX(-100px) translateY(-100px); }
            100% { transform: translateX(100px) translateY(100px); }
        }

        .auth-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            position: relative;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .auth-header {
            background: linear-gradient(135deg, #10b981, #059669, #047857);
            padding: 40px 30px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .auth-header::before {
            content: '🏢';
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 30px;
            opacity: 0.3;
            animation: bounce 2s infinite;
        }

        .auth-header::after {
            content: '🔐';
            position: absolute;
            top: 15px;
            left: 20px;
            font-size: 25px;
            opacity: 0.4;
            animation: pulse 3s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.1); }
        }

        .auth-header h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .auth-header h1::before {
            content: '🌟';
            font-size: 32px;
            animation: sparkle 2s ease-in-out infinite;
        }

        @keyframes sparkle {
            0%, 100% { transform: rotate(0deg) scale(1); }
            25% { transform: rotate(-10deg) scale(1.1); }
            75% { transform: rotate(10deg) scale(1.1); }
        }

        .auth-header p {
            opacity: 0.95;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .auth-header p::before {
            content: '🛡️';
            font-size: 18px;
        }

        .auth-tabs {
            display: flex;
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            border-bottom: 1px solid #bbf7d0;
        }

        .tab-button {
            flex: 1;
            padding: 15px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            color: #065f46;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
            position: relative;
        }

        .tab-button:hover {
            background: rgba(16, 185, 129, 0.1);
        }

        .tab-button.active {
            color: #047857;
            background: white;
            border-bottom-color: #10b981;
            box-shadow: 0 -2px 10px rgba(16, 185, 129, 0.2);
        }

        .tab-button.active::before {
            content: '👤';
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
        }

        .tab-button:nth-child(1).active::before {
            content: '🔑';
        }

        .tab-button:nth-child(2).active::before {
            content: '📝';
        }

        .auth-form {
            padding: 40px 30px;
            display: none;
        }

        .auth-form.active {
            display: block;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #065f46;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #d1fae5;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f0fdf4;
            box-shadow: inset 0 2px 4px rgba(16, 185, 129, 0.05);
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #10b981;
            background: white;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15);
            transform: translateY(-1px);
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #10b981, #059669, #047857);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .role-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin: 2px;
        }

        .role-super-admin { background: #fecaca; color: #991b1b; }
        .role-admin { background: #fed7aa; color: #9a3412; }
        .role-manager { background: #bfdbfe; color: #1e40af; }
        .role-employee { background: #bbf7d0; color: #047857; }
        .role-customer { background: #e9d5ff; color: #6b21a8; }

        .dashboard {
            display: none;
            padding: 40px 30px;
            text-align: center;
            background: linear-gradient(135deg, #f0fdf4, #ecfdf5);
        }

        .dashboard.active {
            display: block;
        }

        .welcome-message {
            font-size: 26px;
            margin-bottom: 20px;
            color: #065f46;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .welcome-message::before {
            content: '🎉';
            font-size: 30px;
            animation: celebration 2s ease-in-out infinite;
        }

        @keyframes celebration {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-15deg); }
            75% { transform: rotate(15deg); }
        }

        .user-info {
            background: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            border: 2px solid #bbf7d0;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);
            position: relative;
        }

        .user-info::before {
            content: '👨‍💼';
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            opacity: 0.6;
        }

        .logout-btn {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0 auto;
        }

        .logout-btn::before {
            content: '🚪';
            font-size: 16px;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
        }

        .error-message {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            color: #991b1b;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 5px solid #ef4444;
            display: none;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error-message::before {
            content: '❌';
            font-size: 18px;
        }

        .success-message {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            color: #166534;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 5px solid #22c55e;
            display: none;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message::before {
            content: '✅';
            font-size: 18px;
        }

        .loading {
            display: none;
            text-align: center;
            padding: 20px;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #e5e7eb;
            border-top: 4px solid #4f46e5;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 15px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .permissions-info {
            margin-top: 20px;
            padding: 20px;
            background: #f8fafc;
            border-radius: 10px;
        }

        .permissions-info h3 {
            color: #374151;
            margin-bottom: 15px;
        }

        .permissions-list {
            list-style: none;
        }

        .permissions-list li {
            padding: 5px 0;
            color: #6b7280;
            font-size: 14px;
        }

        .permissions-list li:before {
            content: "✓";
            color: #10b981;
            font-weight: bold;
            margin-right: 8px;
        }

        @media (max-width: 480px) {
            .auth-container {
                margin: 10px;
            }
            
            .auth-header {
                padding: 30px 20px;
            }
            
            .auth-form {
                padding: 30px 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- Header -->
        <div class="auth-header">
            <h1>Sistema Multicompany</h1>
            <p>Acceso seguro basado en roles</p>
        </div>

        <!-- Navigation Tabs -->
        <div class="auth-tabs">
            <button class="tab-button active" onclick="showTab('login')">Iniciar Sesión</button>
            <button class="tab-button" onclick="showTab('register')">Registrarse</button>
        </div>

        <!-- Messages -->
        <div id="errorMessage" class="error-message"></div>
        <div id="successMessage" class="success-message"></div>
        <div id="loading" class="loading">
            <div class="spinner"></div>
            <p>Procesando...</p>
        </div>

        <!-- Login Form -->
        <form id="loginForm" class="auth-form active">
            <div class="form-group">
                <label for="loginEmail">📧 Email o Usuario</label>
                <input type="text" id="loginEmail" name="email" required>
            </div>
            <div class="form-group">
                <label for="loginPassword">🔒 Contraseña</label>
                <input type="password" id="loginPassword" name="password" required>
            </div>
            <button type="submit" class="submit-btn">Iniciar Sesión</button>
        </form>

        <!-- Register Form -->
        <form id="registerForm" class="auth-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">👤 Nombre</label>
                    <input type="text" id="firstName" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="lastName">👤 Apellido</label>
                    <input type="text" id="lastName" name="last_name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">📧 Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">🏷️ Usuario</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="documentType">📄 Tipo de Documento</label>
                    <select id="documentType" name="document_type" required>
                        <option value="">Seleccionar</option>
                        <option value="CC">Cédula de Ciudadanía</option>
                        <option value="CE">Cédula de Extranjería</option>
                        <option value="NIT">NIT</option>
                        <option value="PASSPORT">Pasaporte</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="documentNumber">🔢 Número de Documento</label>
                    <input type="text" id="documentNumber" name="document_number" required>
                </div>
            </div>
            <div class="form-group">
                <label for="phoneNumber">📱 Teléfono</label>
                <input type="tel" id="phoneNumber" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="address">🏠 Dirección</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="password">🔒 Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="passwordConfirmation">🔒 Confirmar Contraseña</label>
                    <input type="password" id="passwordConfirmation" name="password_confirmation" required>
                </div>
            </div>
            <div class="form-group">
                <label for="roleSelect">👨‍💼 Rol</label>
                <select id="roleSelect" name="role_id" required>
                    <option value="">Seleccionar rol</option>
                    <option value="5">🛒 Cliente</option>
                    <option value="4">👷 Empresa</option>
                </select>
            </div>
            <button type="submit" class="submit-btn">Registrarse</button>
        </form>

        <!-- Dashboard -->
        <div id="dashboard" class="dashboard">
            <div class="welcome-message">
                ¡Bienvenido al sistema!
            </div>
            <div class="user-info">
                <p><strong>Usuario:</strong> <span id="currentUserName"></span></p>
                <p><strong>Email:</strong> <span id="currentUserEmail"></span></p>
                <p><strong>Rol:</strong> <span id="currentUserRole"></span></p>
                <p><strong>Documento:</strong> <span id="currentUserDocument"></span></p>
            </div>
            <div class="permissions-info">
                <h3>Permisos disponibles:</h3>
                <ul id="permissionsList" class="permissions-list"></ul>
            </div>
            <button class="logout-btn" onclick="logout()">Cerrar Sesión</button>
        </div>
    </div>

    <script>
        // Simulación de base de datos de usuarios
        let users = [
            {
                id: 1,
                first_name: "Super",
                last_name: "Admin",
                email: "super@admin.com",
                username: "superadmin",
                password: "123456",
                document_type: "CC",
                document_number: "12345678",
                phone_number: "1234567890",
                address: "Calle 123",
                role_id: 1,
                role_name: "SUPER_ADMIN"
            },
            {
                id: 2,
                first_name: "Admin",
                last_name: "Sistema",
                email: "admin@sistema.com",
                username: "admin",
                password: "123456",
                document_type: "CC",
                document_number: "87654321",
                phone_number: "0987654321",
                address: "Carrera 456",
                role_id: 2,
                role_name: "ADMIN"
            },
            {
                id: 3,
                first_name: "Empresa",
                last_name: "Empresa",
                email: "manager@empresa.com",
                username: "manager",
                password: "123456",
                document_type: "CC",
                document_number: "11223344",
                phone_number: "5566778899",
                address: "Avenida 789",
                role_id: 3,
                role_name: "MANAGER"
            }
        ];

        // Definición de roles y permisos
        const roles = {
            1: {
                name: "SUPER_ADMIN",
                displayName: "Super Administrador",
                permissions: [
                    "Gestión completa del sistema",
                    "Administrar todas las empresas",
                    "Gestionar usuarios y roles",
                    "Acceso a configuración global",
                    "Reportes y auditoría completa"
                ]
            },
            2: {
                name: "ADMIN",
                displayName: "Administrador",
                permissions: [
                    "Gestión de empresa asignada",
                    "Administrar usuarios de la empresa",
                    "Configuración de empresa",
                    "Reportes de empresa",
                    "Gestión de empleados"
                ]
            },
            3: {
                name: "MANAGER",
                displayName: "Gerente",
                permissions: [
                    "Supervisión de equipos",
                    "Reportes departamentales",
                    "Gestión de empleados a cargo",
                    "Aprobación de procesos",
                    "Seguimiento de metas"
                ]
            },
            4: {
                name: "EMPLOYEE",
                displayName: "Empleado",
                permissions: [
                    "Acceso a herramientas de trabajo",
                    "Actualizar información personal",
                    "Ver reportes asignados",
                    "Participar en procesos",
                    "Comunicación interna"
                ]
            },
            5: {
                name: "CUSTOMER",
                displayName: "Cliente",
                permissions: [
                    "Acceso a servicios contratados",
                    "Gestión de perfil",
                    "Soporte técnico",
                    "Facturación y pagos",
                    "Historial de servicios"
                ]
            }
        };

        let currentUser = null;

        // Funciones de UI
        function showTab(tabName) {
            // Ocultar todos los formularios
            document.querySelectorAll('.auth-form').forEach(form => {
                form.classList.remove('active');
            });
            
            // Ocultar dashboard
            document.getElementById('dashboard').classList.remove('active');
            
            // Mostrar el formulario seleccionado
            document.getElementById(tabName + 'Form').classList.add('active');
            
            // Actualizar botones de tab
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Activar el botón correspondiente
            const buttons = document.querySelectorAll('.tab-button');
            if (tabName === 'login') {
                buttons[0].classList.add('active');
            } else {
                buttons[1].classList.add('active');
            }
            
            // Limpiar mensajes
            clearMessages();
        }

        function showMessage(message, type) {
            clearMessages();
            const messageElement = document.getElementById(type + 'Message');
            messageElement.textContent = message;
            messageElement.style.display = 'flex';
        }

        function clearMessages() {
            document.getElementById('errorMessage').style.display = 'none';
            document.getElementById('successMessage').style.display = 'none';
        }

        function showLoading() {
            document.getElementById('loading').style.display = 'block';
        }

        function hideLoading() {
            document.getElementById('loading').style.display = 'none';
        }

        // Funciones de autenticación
        function login(email, password) {
            showLoading();
            
            // Simular delay de API
            setTimeout(() => {
                const user = users.find(u => 
                    (u.email === email || u.username === email) && 
                    u.password === password
                );
                
                hideLoading();
                
                if (user) {
                    currentUser = user;
                    showDashboard();
                    showMessage('¡Bienvenido al sistema!', 'success');
                } else {
                    showMessage('Credenciales incorrectas. Intenta de nuevo.', 'error');
                }
            }, 1500);
        }

        function register(userData) {
            showLoading();
            
            // Simular delay de API
            setTimeout(() => {
                // Validar email único
                const emailExists = users.find(u => u.email === userData.email);
                const usernameExists = users.find(u => u.username === userData.username);
                
                hideLoading();
                
                if (emailExists) {
                    showMessage('El email ya está registrado.', 'error');
                    return;
                }
                
                if (usernameExists) {
                    showMessage('El nombre de usuario ya existe.', 'error');
                    return;
                }
                
                if (userData.password !== userData.password_confirmation) {
                    showMessage('Las contraseñas no coinciden.', 'error');
                    return;
                }
                
                // Crear nuevo usuario
                const newUser = {
                    id: users.length + 1,
                    ...userData,
                    role_name: roles[userData.role_id].name
                };
                
                users.push(newUser);
                showMessage('¡Registro exitoso! Ya puedes iniciar sesión.', 'success');
                
                // Cambiar a tab de login
                showTab('login');
                document.getElementById('registerForm').reset();
            }, 1500);
        }

        function showDashboard() {
            // Ocultar formularios
            document.querySelectorAll('.auth-form').forEach(form => {
                form.classList.remove('active');
            });
            
            // Ocultar tabs
            document.querySelector('.auth-tabs').style.display = 'none';
            
            // Mostrar dashboard
            document.getElementById('dashboard').classList.add('active');
            
            // Llenar información del usuario
            document.getElementById('currentUserName').textContent = 
                `${currentUser.first_name} ${currentUser.last_name}`;
            document.getElementById('currentUserEmail').textContent = currentUser.email;
            document.getElementById('currentUserRole').innerHTML = 
                `<span class="role-badge role-${currentUser.role_name.toLowerCase().replace('_', '-')}">${roles[currentUser.role_id].displayName}</span>`;
            document.getElementById('currentUserDocument').textContent = 
                `${currentUser.document_type}: ${currentUser.document_number}`;
            
            // Mostrar permisos
            const permissionsList = document.getElementById('permissionsList');
            permissionsList.innerHTML = '';
            roles[currentUser.role_id].permissions.forEach(permission => {
                const li = document.createElement('li');
                li.textContent = permission;
                permissionsList.appendChild(li);
            });
        }

        function logout() {
            currentUser = null;
            // Mostrar tabs nuevamente
            document.querySelector('.auth-tabs').style.display = 'flex';
            showTab('login');
            document.getElementById('loginForm').reset();
            showMessage('Sesión cerrada exitosamente.', 'success');
        }

        // Event listeners
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            login(email, password);
        });

        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const userData = Object.fromEntries(formData.entries());
            userData.role_id = parseInt(userData.role_id);
            register(userData);
        });

        // Inicialización
        document.addEventListener('DOMContentLoaded', function() {
            // Prellenar algunos campos para demo
            document.getElementById('loginEmail').value = 'super@admin.com';
            document.getElementById('loginPassword').value = '123456';
        });
    </script>
</body>
</html>
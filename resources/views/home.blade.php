<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tienda en Línea</title>
    <style>
        :root {
            --primary-green: #1E7C4F;
            --light-green: #A3D9A5;
            --background-color: #E6F3E6;
            --card-bg-color: #F8FFF8;
            --border-radius-large: 30px;
            --border-radius-card: 20px;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            margin: 0;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        /* Animación fadeIn para contenedores */
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            animation: slideDown 0.8s ease forwards;
            opacity: 0;
        }

        @keyframes slideDown {
            to {
                opacity: 1;
                transform: translateY(0);
            }
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        .logo a {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-green);
            text-decoration: none;
            transition: color 0.3s;
        }

        .logo a:hover {
            color: var(--light-green);
        }

        .nav-menu {
            display: flex;
            gap: 20px;
            font-size: 1rem;
        }

        .nav-menu a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s, transform 0.2s;
            position: relative;
        }

        .nav-menu a::after {
            content: '';
            display: block;
            width: 0%;
            height: 2px;
            background: var(--light-green);
            transition: width 0.3s;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

        .nav-menu a:hover {
            color: var(--light-green);
            transform: scale(1.1);
        }
        .nav-menu a:hover::after {
            width: 100%;
        }

        .user-actions {
            display: flex;
            gap: 15px;
        }

        .user-actions a {
            color: var(--primary-green);
            transition: transform 0.3s;
        }

        .user-actions a:hover {
            transform: scale(1.2);
        }

        /* Hero Section */
        .hero-section {
            background-color: var(--light-green);
            border-radius: var(--border-radius-large);
            padding: 50px;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 40px;
            opacity: 0;
            animation: fadeInUp 1s ease forwards;
            animation-delay: 0.5s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-content {
            position: relative;
            z-index: 10;
        }

        .hero-content h1 {
            font-size: 3rem;
            color: var(--primary-green);
            margin: 0 0 10px;
            animation: letterFade 1.5s ease forwards;
            opacity: 0;
        }

        @keyframes letterFade {
            0% {
                opacity: 0;
                letter-spacing: 10px;
            }
            100% {
                opacity: 1;
                letter-spacing: normal;
            }
        }

        .hero-content p {
            font-size: 1.2rem;
            color: #555;
            max-width: 600px;
            margin: 0 auto 20px;
            animation: fadeIn 2s ease forwards;
            opacity: 0;
            animation-delay: 1s;
        }

        .cta-button {
            background-color: var(--primary-green);
            color: white;
            padding: 15px 30px;
            border-radius: var(--border-radius-large);
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
            display: inline-block;
            animation: fadeIn 2.5s ease forwards;
            opacity: 0;
            animation-delay: 1.5s;
        }

        .cta-button:hover {
            background-color: #1a6b43;
            transform: scale(1.05);
        }

        /* Blade Background */
        .blade-background {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1.5);
            width: 100%;
            height: 100%;
            z-index: 0;
            opacity: 0.1;
            animation: slowRotate 30s linear infinite;
        }

        @keyframes slowRotate {
            from {
                transform: translate(-50%, -50%) scale(1.5) rotate(0deg);
            }
            to {
                transform: translate(-50%, -50%) scale(1.5) rotate(360deg);
            }
        }

        .blade-figure-svg {
            fill: var(--primary-green);
            width: 100%;
            height: 100%;
        }

        /* Section Titles */
        .section-title {
            font-size: 2rem;
            color: var(--primary-green);
            text-align: center;
            margin-bottom: 30px;
            opacity: 0;
            animation: fadeIn 1.2s forwards;
        }

        /* Categories Grid */
        .categories-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .category-card {
            background-color: white;
            border-radius: var(--border-radius-card);
            padding: 20px;
            text-align: center;
            flex-basis: 150px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            opacity: 0;
            animation: fadeInUp 0.8s forwards;
        }

        /* Retrasar animaciones en categorías para efecto cascada */
        .category-card:nth-child(1) { animation-delay: 0.3s; }
        .category-card:nth-child(2) { animation-delay: 0.5s; }
        .category-card:nth-child(3) { animation-delay: 0.7s; }
        .category-card:nth-child(4) { animation-delay: 0.9s; }
        .category-card:nth-child(5) { animation-delay: 1.1s; }

        .category-card:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .category-card img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
            transition: transform 0.3s;
        }

        .category-card:hover img {
            transform: rotate(15deg);
        }

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .product-card {
            background-color: var(--card-bg-color);
            border-radius: var(--border-radius-card);
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            opacity: 0;
            animation: fadeInUp 0.8s forwards;
        }

        /* Animación en cascada para productos */
        .product-card:nth-child(1) { animation-delay: 0.4s; }
        .product-card:nth-child(2) { animation-delay: 0.6s; }
        .product-card:nth-child(3) { animation-delay: 0.8s; }
        .product-card:nth-child(4) { animation-delay: 1s; }

        .product-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            margin-bottom: 10px;
            transition: transform 0.3s;
        }

        .product-card:hover img {
            transform: scale(1.1);
        }

        .product-name {
            font-size: 1.1rem;
            font-weight: bold;
            color: var(--primary-green);
            margin-bottom: 5px;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #555;
            margin-bottom: 10px;
        }

        .add-to-cart-button {
            background-color: var(--primary-green);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .add-to-cart-button:hover {
            background-color: #1a6b43;
            transform: scale(1.1);
        }

        /* Footer */
        .footer {
            background-color: var(--primary-green);
            color: white;
            text-align: center;
            padding: 20px 0;
            border-radius: var(--border-radius-large) var(--border-radius-large) 0 0;
            opacity: 0;
            animation: fadeIn 1.5s forwards;
            animation-delay: 2s;
        }

        .footer p {
            margin: 0;
        }

        .footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            transition: opacity 0.3s, transform 0.3s;
        }

        .footer a:hover {
            opacity: 0.8;
            transform: scale(1.1);
        }

        /* --- Ajustes Responsivos --- */
        @media (max-width: 900px) {
            .nav-menu {
                flex-direction: column;
                gap: 10px;
                font-size: 0.9rem;
            }

            .user-actions {
                gap: 10px;
            }

            .categories-grid {
                flex-direction: column;
                align-items: center;
            }

            .category-card {
                flex-basis: 80%;
                max-width: 300px;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
                gap: 15px;
            }

            .hero-section {
                padding: 30px 20px;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1rem;
                max-width: 90%;
            }
        }

        @media (max-width: 500px) {
            .nav-menu {
                display: none; /* Puedes agregar menú hamburguesa si quieres */
            }

            .container {
                padding: 10px;
            }

            .category-card {
                flex-basis: 100%;
                max-width: none;
            }

            .products-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .hero-content h1 {
                font-size: 1.5rem;
            }

            .cta-button {
                padding: 12px 20px;
                font-size: 1rem;
            }
        }

        /* Botones Login/Register */
.login-button,
.register-button {
    background-color: transparent;
    border: 2px solid var(--primary-green);
    border-radius: 20px;
    padding: 6px 16px;
    font-weight: bold;
    color: var(--primary-green);
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s, transform 0.3s;
    font-size: 0.95rem;
    animation: fadeIn 1.2s forwards;
    opacity: 0;
}

.login-button {
    animation-delay: 0.6s;
}

.register-button {
    animation-delay: 0.8s;
}

.login-button:hover,
.register-button:hover {
    background-color: var(--primary-green);
    color: white;
    transform: scale(1.05);
}

    </style>
</head>
<body>

<header class="header container">
    <div class="logo">
        <a href="#">Tienda Verde</a>
    </div>
    <nav class="nav-menu">
        <a href="#">Inicio</a>
        <a href="#">Tienda</a>
        <a href="#">Ofertas</a>
        <a href="#">Contacto</a>
    </nav>
    <div class="user-actions">
        <a href="#"><img src="https://img.icons8.com/material-rounded/24/1E7C4F/search--v1.png" alt="Buscar" /></a>
        <a href="/cart"><img src="https://img.icons8.com/material-rounded/24/1E7C4F/shopping-cart.png" alt="Carrito" /></a>
   
    <a href="login" class="login-button">Login</a>
    <a href="login" class="register-button">Register</a>
</div>

    </div>
</header>

<main>
    <!-- Sección principal con el concepto "Homme en Blade" -->
    <section class="hero-section container">
        <div class="blade-background">
    <svg viewBox="0 0 100 100" class="blade-figure-svg" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
        <!-- Forma más orgánica, tipo hoja estilizada -->
        <path d="M50 5
                 C65 15, 80 35, 60 70
                 C50 90, 30 80, 35 50
                 C40 30, 45 20, 50 5
                 Z" fill="none" stroke="currentColor" stroke-width="3" />
        <!-- Círculo interior para detalle -->
        <circle cx="50" cy="40" r="8" fill="currentColor" opacity="0.2" />
    </svg>
</div>

        <div class="hero-content">
            <h1>Compra los mejores productos</h1>
            <p>Descubre nuestra colección exclusiva y encuentra lo que necesitas para tu hogar, estilo y tecnología.</p>
            <a href="#" class="cta-button">Explorar Productos</a>
        </div>
    </section>

    <!-- Sección de Categorías -->
    <section class="container">
        <h2 class="section-title">Nuestras Categorías</h2>
        <div class="categories-grid">
            <a href="#" class="category-card">
                <img src="https://img.icons8.com/material-rounded/50/1E7C4F/electronics.png" alt="Electrónica" />
                <p>Electrónica</p>
            </a>
            <a href="#" class="category-card">
                <img src="https://img.icons8.com/material-rounded/50/1E7C4F/t-shirt.png" alt="Moda" />
                <p>Moda</p>
            </a>
            <a href="#" class="category-card">
                <img src="https://img.icons8.com/material-rounded/50/1E7C4F/kitchen-room.png" alt="Hogar" />
                <p>Hogar</p>
            </a>
            <a href="#" class="category-card">
                <img src="https://img.icons8.com/material-rounded/50/1E7C4F/book.png" alt="Libros" />
                <p>Libros</p>
            </a>
            <a href="#" class="category-card">
                <img src="https://img.icons8.com/material-rounded/50/1E7C4F/plant.png" alt="Jardín" />
                <p>Jardín</p>
            </a>
        </div>
    </section>

    <!-- Sección de Productos Destacados -->
    <section class="container">
        <h2 class="section-title">Productos Destacados</h2>
        <div class="products-grid">
            <div class="product-card">
                <img src="https://via.placeholder.com/250x250/A3D9A5/FFFFFF?text=Producto+1" alt="Producto 1" />
                <h3 class="product-name">Auriculares Inalámbricos</h3>
                <p class="product-price">$59.99</p>
                <button class="add-to-cart-button">Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250x250/A3D9A5/FFFFFF?text=Producto+2" alt="Producto 2" />
                <h3 class="product-name">Reloj Inteligente</h3>
                <p class="product-price">$129.99</p>
                <button class="add-to-cart-button">Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250x250/A3D9A5/FFFFFF?text=Producto+3" alt="Producto 3" />
                <h3 class="product-name">Cafetera de Diseño</h3>
                <p class="product-price">$89.50</p>
                <button class="add-to-cart-button">Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250x250/A3D9A5/FFFFFF?text=Producto+4" alt="Producto 4" />
                <h3 class="product-name">Mochila Urbana</h3>
                <p class="product-price">$45.00</p>
                <button class="add-to-cart-button">Añadir al carrito</button>
            </div>
        </div>
    </section>

    <!-- Banner de Promoción -->
    <section class="container">
        <div class="hero-section">
            <div class="hero-content">
                <h1>¡Ofertas de Verano!</h1>
                <p>Hasta 50% de descuento en productos seleccionados. ¡No te lo pierdas!</p>
                <a href="#" class="cta-button">
                    Ver Ofertas
                </a>
            </div>
        </div>
    </section>
</main>
<footer class="footer container">
    <p>&copy; 2023 Tienda Verde. Todos los derechos reservados.</p>
    <p>
        <a href="#">Política de Privacidad</a> |
        <a href="#">Términos de Servicio</a> |
        <a href="#">Contacto</a>
    </p>
</footer>
</body>
</html>

            

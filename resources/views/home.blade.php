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
        <a href="#">La verde</a>
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
            <a href="/products" class="cta-button">Explorar Productos</a>
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
                <img src="https://img.icons8.com/?size=32&id=16137&format=png" alt="Jardín" />
                <p>Jardín</p>
            </a>
        </div>
    </section>

    <!-- Sección de Productos Destacados -->
    <section class="container">
        <h2 class="section-title">Productos Destacados</h2>
        <div class="products-grid">
            <div class="product-card">
                <img src="https://media.istockphoto.com/id/2154218635/es/foto/auriculares-blutooth-inal%C3%A1mbricos.webp?b=1&s=612x612&w=0&k=20&c=5_ZpvZlmK73TW8kwrnXU5BmZRhhwN1BCp1J9uizUjMA=" alt="Producto 1" />
                <h3 class="product-name">Auriculares Inalámbricos</h3>
                <p class="product-price">$59.99</p>
                <button class="add-to-cart-button">Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="data:image/jpeg;base64,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" alt="Producto 2" />
                <h3 class="product-name">Reloj Inteligente</h3>
                <p class="product-price">$129.99</p>
                <button class="add-to-cart-button">Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRMwgGj_sxNvWvKg66JDsuZIqEDM5aua5FyA&s" alt="Producto 3" />
                <h3 class="product-name">Cafetera de Diseño</h3>
                <p class="product-price">$89.50</p>
                <button class="add-to-cart-button">Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-bKhlvOvWmC5vgeM6IUZxIUu1QhRGqa_Luw&s" alt="Producto 4" />
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

            

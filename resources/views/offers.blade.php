@extends('layouts.app')

@section('title', 'Ofertas')

@section('content')
    <style>
        .ofertas-container {
            max-width: 1280px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .ofertas-container h2 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 40px;
            color: var(--dark-green);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }

        .product-card {
            background: white;
            border: 1px solid var(--lighter-green);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.06);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-details {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            justify-content: space-between;
        }

        .product-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-green);
            margin-bottom: 10px;
        }

        .product-price {
            margin-bottom: 15px;
        }

        .product-price del {
            color: #999;
            font-size: 0.9rem;
            margin-right: 8px;
        }

        .product-price strong {
            color: var(--dark-green);
            font-size: 1.2rem;
        }

        .add-to-cart-button {
            background: linear-gradient(135deg, var(--light-green), var(--primary-green));
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            transition: background 0.3s ease;
        }

        .add-to-cart-button:hover {
            background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
        }

        @media (max-width: 768px) {
            .ofertas-container h2 {
                font-size: 2rem;
            }

            .product-card img {
                height: 180px;
            }
        }
    </style>

    <section class="ofertas-container">

        <div class="products-grid">

            <div class="product-card">
                <img src="https://cdn.pixabay.com/photo/2017/08/14/16/15/earphone-2640990_640.jpg" alt="Auriculares Bluetooth">
                <div class="product-details">
                    <h3 class="product-name">Auriculares Bluetooth</h3>
                    <p class="product-price">
                        <del>$89.99</del>
                        <strong>$49.99</strong>
                    </p>
                    <button class="add-to-cart-button">Añadir al carrito</button>
                </div>
            </div>

            <div class="product-card">
                <img src="https://media.istockphoto.com/id/1263458593/es/foto/silla-de-juego-c%C3%B3moda-en-negro-y-rojo-aislado-sobre-un-fondo-blanco-muebles-para-los-jugadores.jpg?s=612x612&w=0&k=20&c=0djbQJ574a60SiXj9XKIbVERRvcnB_E0DIaaMpzuy74=" alt="Auriculares Bluetooth">
                <div class="product-details">
                    <h3 class="product-name">Silla Gamer</h3>
                    <p class="product-price">
                        <del>$1000.99</del>
                        <strong>$119.99</strong>
                    </p>
                    <button class="add-to-cart-button">Añadir al carrito</button>
                </div>
            </div>

            <div class="product-card">
                <img src="https://media.istockphoto.com/id/1323847906/es/foto/lugar-de-trabajo-elegante-con-escritorio-de-madera-y-silla-c%C3%B3moda-sobre-fondo-blanco.jpg?s=612x612&w=0&k=20&c=v_5eP2pcGF7ZCxO-mHKC2E_xjAY84qVG2-0m8whHBbs=" alt="Auriculares Bluetooth">
                <div class="product-details">
                    <h3 class="product-name">Escritorio</h3>
                    <p class="product-price">
                        <del>$100.99</del>
                        <strong>$9.99</strong>
                    </p>
                    <button class="add-to-cart-button">Añadir al carrito</button>
                </div>
            </div>

            <div class="product-card">
                <img src="https://cdn.pixabay.com/photo/2015/08/13/01/00/keyboard-886462_640.jpg" alt="Auriculares Bluetooth">
                <div class="product-details">
                    <h3 class="product-name">Teclado</h3>
                    <p class="product-price">
                        <del>$10.99</del>
                        <strong>$6.99</strong>
                    </p>
                    <button class="add-to-cart-button">Añadir al carrito</button>
                </div>
            </div>

            <div class="product-card">
                <img src="https://cdn.pixabay.com/photo/2019/07/16/16/20/portrait-4342205_640.jpg" alt="Auriculares Bluetooth">
                <div class="product-details">
                    <h3 class="product-name">Casa de muñecas</h3>
                    <p class="product-price">
                        <del>$106.99</del>
                        <strong>$76.99</strong>
                    </p>
                    <button class="add-to-cart-button">Añadir al carrito</button>
                </div>
            </div>

            <div class="product-card">
                <img src="https://cdn.pixabay.com/photo/2017/08/10/08/47/laptop-2620118_640.jpg" alt="Auriculares Bluetooth">
                <div class="product-details">
                    <h3 class="product-name">Computador</h3>
                    <p class="product-price">
                        <del>$10.99</del>
                        <strong>$6.99</strong>
                    </p>
                    <button class="add-to-cart-button">Añadir al carrito</button>
                </div>
            </div>

    </section>
@endsection

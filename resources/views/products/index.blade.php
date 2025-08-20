@extends('layouts.app')

@section('content')
<div class="main-container">
    <div class="main-content">

        <!-- Botón crear -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-primary">➕ Crear nuevo producto</a>
        </div>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Grid de productos -->
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card product-card h-100">
                        <!-- Imagen del producto -->
                        <img src="{{ $product->image ?? 'https://via.placeholder.com/400x250?text=Producto' }}" 
                             class="card-img-top product-img" 
                             alt="Imagen de {{ $product->name }}">

                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between align-items-center">
                                {{ $product->name }}
                                <span class="status-badge {{ $product->status === 'activo' ? 'status-active' : 'status-inactive' }}">
                                    {{ ucfirst($product->status) }}
                                </span>
                            </h5>
                            <p class="card-text"><strong>ID:</strong> {{ $product->id }}</p>
                            <p class="card-text price"><strong>Precio:</strong> ${{ number_format($product->unit_price, 2) }}</p>
                        </div>

                        <div class="card-footer text-end action-buttons">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">👁️ Ver</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑️ Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        ⚠️ No hay productos registrados.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Estilos -->
<style>
    :root {
        --primary-green: #1E7C4F;
        --light-green: #A3D9A5;
        --background-color: #E6F3E6;
        --card-bg-color: #F8FFF8;
        --dark-green: #065f46;
        --warning: #f59e0b;
        --danger: #ef4444;
        --info: #0ea5e9;
    }

    body {
        background: var(--background-color);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .main-container {
        background: white;
        border-radius: 25px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        max-width: 1400px;
        margin: 40px auto;
        padding: 20px;
        animation: fadeIn 1s forwards;
        opacity: 0;
    }

    @keyframes fadeIn {
        to { opacity: 1; }
    }

    .main-content {
        background-color: var(--card-bg-color);
        border-radius: 20px;
        padding: 25px;
    }

    .header {
        background: linear-gradient(135deg, var(--light-green), var(--primary-green));
        color: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        text-align: center;
    }

    /* Cards de productos */
    .product-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: var(--card-bg-color);
    }

    .product-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .product-img {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        height: 220px;
        object-fit: cover;
    }

    .card-title {
        font-weight: bold;
        color: var(--dark-green);
    }

    .price {
        color: var(--primary-green);
        font-size: 16px;
        font-weight: 600;
    }

    /* Botones */
    .btn {
        border-radius: 12px;
        font-weight: 600;
        padding: 8px 14px;
        transition: transform 0.2s, box-shadow 0.3s;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(0,0,0,0.15);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--light-green), var(--primary-green));
        border: none;
    }

    .btn-info {
        background: linear-gradient(135deg, var(--info), #0284c7);
        border: none;
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--warning), #d97706);
        border: none;
    }

    .btn-danger {
        background: linear-gradient(135deg, var(--danger), #dc2626);
        border: none;
    }

    /* Estado */
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-active {
        background-color: rgba(16, 185, 129, 0.15);
        color: var(--dark-green);
    }

    .status-inactive {
        background-color: rgba(239, 68, 68, 0.15);
        color: #991b1b;
    }
</style>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="show-container">
        <div class="card show-card">
            <div class="card-header">
                <h1 class="mb-0">📦 Detalle del Producto</h1>
            </div>
            <div class="card-body">
                <h3 class="product-name">{{ $product->name }}</h3>
                <p><strong>📝 Descripción:</strong> {{ $product->description }}</p>
                <p><strong>💲 Precio:</strong> ${{ $product->unit_price }}</p>
                <p><strong>🏷️ Código de Barras:</strong> {{ $product->barcode }}</p>
                <p><strong>📌 Estado:</strong> 
                    <span class="badge status-{{ $product->status }}">
                        {{ ucfirst($product->status) }}
                    </span>
                </p>
                <p><strong>🏬 ID de Sucursal:</strong> {{ $product->branch_id }}</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-secondary btn-modern">↩️ Volver</a>
            </div>
        </div>
    </div>
</div>

<!-- Estilos modernos -->
<style>
    :root {
        --primary-green: #059669;
        --dark-green: #065f46;
        --medium-green: #047857;
        --light-green: #10b981;
        --background-green: #ecfdf5;
    }

    .show-container {
        max-width: 700px;
        margin: 0 auto;
    }

    .show-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .show-card .card-header {
        background: linear-gradient(135deg, var(--light-green), var(--primary-green));
        color: white;
        padding: 20px;
        border: none;
        text-align: center;
    }

    .show-card .card-body {
        padding: 25px;
        font-size: 1rem;
    }

    .product-name {
        font-weight: bold;
        font-size: 1.5rem;
        color: var(--dark-green);
        margin-bottom: 15px;
    }

    /* Badge de estados */
    .badge {
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 0.9rem;
        font-weight: bold;
        color: white;
    }
    .status-pendiente {
        background: #facc15; /* Amarillo */
    }
    .status-aprobado {
        background: var(--primary-green);
    }
    .status-rechazado {
        background: #ef4444; /* Rojo */
    }

    /* Botón moderno */
    .btn-modern {
        border-radius: 12px;
        font-weight: bold;
        padding: 10px 18px;
        transition: all 0.3s ease;
    }

    .btn-secondary.btn-modern {
        background: linear-gradient(135deg, #9ca3af, #6b7280);
        border: none;
    }
    .btn-secondary.btn-modern:hover {
        background: linear-gradient(135deg, #6b7280, #4b5563);
        transform: translateY(-2px);
    }
</style>
@endsection

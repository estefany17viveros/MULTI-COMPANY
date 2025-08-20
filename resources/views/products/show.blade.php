@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="show-container">
        <div class="card show-card">
            <!-- Encabezado -->
            <div class="card-header text-center">
                <h2 class="mb-0">📦 Detalle del Producto</h2>
            </div>

            <!-- Cuerpo -->
            <div class="card-body">
                <!-- Nombre principal -->
                <h3 class="product-name">{{ $product->name }}</h3>
                
                <!-- Info principal -->
                <div class="info-grid">
                    <p><strong>📝 Descripción:</strong> {{ $product->description }}</p>
                    <p><strong>💲 Precio:</strong> 
                        <span class="price">${{ number_format($product->unit_price, 2) }}</span>
                    </p>
                    <p><strong>🏷️ Código de Barras:</strong> {{ $product->barcode }}</p>
                    <p><strong>📌 Estado:</strong> 
                        <span class="badge status-{{ $product->status }}">
                            {{ ucfirst($product->status) }}
                        </span>
                    </p>
                    <p><strong>🏬 Sucursal:</strong> #{{ $product->branch_id }}</p>
                </div>

                <!-- Sección de características -->
                <h4 class="text-success mt-4">🔎 Características</h4>
                @if($product->characteristics->isNotEmpty())
                    <ul class="list-group list-group-flush">
                        @foreach($product->characteristics as $char)
                            <li class="list-group-item characteristic-item">
                                <span class="char-title">{{ $char->name }}</span>
                                <div class="char-details">
                                    @if($char->brand) <span>🏢 Marca: <b>{{ $char->brand }}</b></span> @endif
                                    @if($char->model) <span>📌 Modelo: <b>{{ $char->model }}</b></span> @endif
                                    @if($char->size) <span>📏 Tamaño: <b>{{ $char->size }}</b></span> @endif
                                    @if($char->weight) <span>⚖️ Peso: <b>{{ $char->weight }}</b></span> @endif
                                    @if($char->material) <span>🧱 Material: <b>{{ $char->material }}</b></span> @endif
                                    @if($char->dimensions) <span>📐 Dimensiones: <b>{{ $char->dimensions }}</b></span> @endif
                                    @if($char->origin) <span>🌍 Origen: <b>{{ $char->origin }}</b></span> @endif
                                </div>
                                <small class="text-muted">📂 Categoría: {{ $char->pivot->category?->name ?? 'N/A' }}</small>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">❌ Este producto no tiene características registradas.</p>
                @endif
            </div>

            <!-- Footer -->
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
        --light-green: #10b981;
        --background: #f9fafb;
        --muted: #6b7280;
    }

    body {
        background: var(--background);
    }

    .show-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .show-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        animation: fadeIn 0.6s ease-in-out;
    }

    .show-card .card-header {
        background: linear-gradient(135deg, var(--light-green), var(--primary-green));
        color: white;
        padding: 22px;
        border: none;
    }

    .show-card .card-body {
        padding: 30px;
        font-size: 1rem;
    }

    .product-name {
        font-weight: 700;
        font-size: 1.8rem;
        color: var(--dark-green);
        margin-bottom: 25px;
        text-align: center;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px 20px;
    }

    .price {
        font-size: 1.2rem;
        font-weight: bold;
        color: var(--primary-green);
    }

    /* Características */
    .characteristic-item {
        border: none;
        padding: 15px 10px;
        background: #f0fdf4;
        border-radius: 12px;
        margin-bottom: 8px;
    }
    .char-title {
        font-weight: 600;
        color: var(--dark-green);
    }
    .char-details span {
        display: inline-block;
        margin-right: 12px;
        font-size: 0.9rem;
        color: var(--muted);
    }

    /* Badge de estados */
    .badge {
        padding: 6px 14px;
        border-radius: 12px;
        font-size: 0.85rem;
        font-weight: bold;
        color: white;
    }
    .status-pendiente { background: #facc15; color: #854d0e; }
    .status-aprobado { background: var(--primary-green); }
    .status-rechazado { background: #ef4444; }

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
        color: white;
    }
    .btn-secondary.btn-modern:hover {
        background: linear-gradient(135deg, #6b7280, #4b5563);
        transform: translateY(-2px);
    }

    /* Animación */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

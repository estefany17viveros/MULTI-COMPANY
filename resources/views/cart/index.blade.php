@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="card shadow-lg border-0 rounded-4" style="background-color:#f0fdf4;">
        <div class="card-header text-white fw-bold" style="background-color:#16a34a;">
            🛒 Carrito de Compras
        </div>
        <div class="card-body">
            <p class="text-muted">Aquí se mostrarán los productos que agregues al carrito.</p>

            <div class="alert border-0 rounded-3" style="background-color:#d1fae5; color:#065f46;">
                ✅ El carrito está vacío por ahora.
            </div>

            <a href="#" class="btn px-4 py-2 text-white shadow-sm" style="background-color:#16a34a; border-radius:8px;">
                ➕ Agregar producto
            </a>
        </div>
    </div>

</div>
@endsection

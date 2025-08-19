@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Producto</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p><strong>Descripción:</strong> {{ $product->description }}</p>
            <p><strong>Precio:</strong> ${{ $product->unit_price }}</p>
            <p><strong>Código de barras:</strong> {{ $product->barcode }}</p>
            <p><strong>Estado:</strong> {{ $product->status }}</p>
            <p><strong>Branch ID:</strong> {{ $product->branch_id }}</p>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection

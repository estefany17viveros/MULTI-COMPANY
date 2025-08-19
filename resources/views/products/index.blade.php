@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Productos</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Crear nuevo producto</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>${{ $product->unit_price }}</td>
                <td>{{ $product->status }}</td>
                <td>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr><td colspan="5">No hay productos registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

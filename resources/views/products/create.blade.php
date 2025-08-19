@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Producto</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="barcode" class="form-label">Código de Barras</label>
            <input type="text" name="barcode" class="form-control" value="{{ old('barcode') }}">
        </div>

        <div class="mb-3">
            <label for="unit_price" class="form-label">Precio Unitario</label>
            <input type="number" step="0.01" name="unit_price" class="form-control" value="{{ old('unit_price') }}" required>
        </div>

        <div class="mb-3">
            <label for="branch_id" class="form-label">ID de Sucursal</label>
            <input type="number" name="branch_id" class="form-control" value="{{ old('branch_id') }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" class="form-control" required>
                @foreach(['pendiente', 'aprobado', 'rechazado'] as $status)
                    <option value="{{ $status }}" @selected(old('status') == $status)>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

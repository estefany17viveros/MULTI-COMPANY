@extends('layouts.app')

@section('content')
<div class="container">
    <h1>➕ Crear Característica</h1>

    <form action="{{ route('characteristics.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Marca (opcional)</label>
            <input type="text" class="form-control" id="brand" name="brand">
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Modelo (opcional)</label>
            <input type="text" class="form-control" id="model" name="model">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('characteristics.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

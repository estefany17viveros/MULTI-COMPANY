@extends('layouts.app')

@section('content')
<div class="container">
    <h1>📌 Detalle de la Característica</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{ $characteristic->name }}</li>
        @if($characteristic->brand)
            <li class="list-group-item"><strong>Marca:</strong> {{ $characteristic->brand }}</li>
        @endif
        @if($characteristic->model)
            <li class="list-group-item"><strong>Modelo:</strong> {{ $characteristic->model }}</li>
        @endif
        @if($characteristic->size)
            <li class="list-group-item"><strong>Tamaño:</strong> {{ $characteristic->size }}</li>
        @endif
        @if($characteristic->weight)
            <li class="list-group-item"><strong>Peso:</strong> {{ $characteristic->weight }}</li>
        @endif
        @if($characteristic->material)
            <li class="list-group-item"><strong>Material:</strong> {{ $characteristic->material }}</li>
        @endif
        @if($characteristic->dimensions)
            <li class="list-group-item"><strong>Dimensiones:</strong> {{ $characteristic->dimensions }}</li>
        @endif
        @if($characteristic->origin)
            <li class="list-group-item"><strong>Origen:</strong> {{ $characteristic->origin }}</li>
        @endif
    </ul>

    <div class="mt-3">
        <a href="{{ route('characteristics.index') }}" class="btn btn-secondary">↩️ Volver</a>
        <a href="{{ route('characteristics.edit', $characteristic) }}" class="btn btn-warning">✏️ Editar</a>
    </div>
</div>
@endsection

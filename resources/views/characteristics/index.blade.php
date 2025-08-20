@extends('layouts.app')

@section('content')
<div class="main-container">
    <div class="main-content">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('characteristics.create') }}" class="btn btn-primary">➕ Crear nueva característica</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @forelse($characteristics as $characteristic)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $characteristic->name }}</h5>
                            @if($characteristic->brand) <p>Marca: {{ $characteristic->brand }}</p> @endif
                            @if($characteristic->model) <p>Modelo: {{ $characteristic->model }}</p> @endif
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('characteristics.show', $characteristic) }}" class="btn btn-info btn-sm">👁️ Ver</a>
                            <a href="{{ route('characteristics.edit', $characteristic) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                            <form action="{{ route('characteristics.destroy', $characteristic) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro?')">
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
                        ⚠️ No hay características registradas.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

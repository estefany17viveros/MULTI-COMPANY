@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">
            ✏️ Editar Característica
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('characteristics.update', $characteristic) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $characteristic->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="brand" class="form-label">Marca</label>
                    <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand', $characteristic->brand) }}">
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Modelo</label>
                    <input type="text" name="model" id="model" class="form-control" value="{{ old('model', $characteristic->model) }}">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('characteristics.index') }}" class="btn btn-secondary">↩️ Volver</a>
                    <button type="submit" class="btn btn-success">💾 Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

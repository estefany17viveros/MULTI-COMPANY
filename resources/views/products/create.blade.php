@extends('layouts.app')

@section('content')
<div class="container">
    <div class="create-container">
        <div class="card create-card">
            <div class="card-header">
                <h1 class="mb-0">➕ Crear Producto</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control input-modern" 
                               value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea name="description" class="form-control input-modern">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="barcode" class="form-label">Código de Barras</label>
                        <input type="text" name="barcode" class="form-control input-modern" 
                               value="{{ old('barcode') }}">
                    </div>

                    <div class="mb-3">
                        <label for="unit_price" class="form-label">Precio Unitario</label>
                        <input type="number" step="0.01" name="unit_price" class="form-control input-modern" 
                               value="{{ old('unit_price') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="branch_id" class="form-label">ID de Sucursal</label>
                        <input type="number" name="branch_id" class="form-control input-modern" 
                               value="{{ old('branch_id') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Estado</label>
                        <select name="status" class="form-select input-modern" required>
                            @foreach(['pendiente', 'aprobado', 'rechazado'] as $status)
                                <option value="{{ $status }}" @selected(old('status') == $status)>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success btn-modern">💾 Guardar</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-modern">↩️ Cancelar</a>
                    </div>
                </form>
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

    .create-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .create-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .create-card .card-header {
        background: linear-gradient(135deg, var(--light-green), var(--primary-green));
        color: white;
        padding: 20px;
        border: none;
        text-align: center;
    }

    .input-modern {
        border-radius: 12px;
        border: 2px solid var(--light-green);
        padding: 10px;
        transition: all 0.3s ease;
    }
    .input-modern:focus {
        border-color: var(--primary-green);
        box-shadow: 0 0 8px rgba(16, 185, 129, 0.4);
    }

    .btn-modern {
        border-radius: 12px;
        font-weight: bold;
        padding: 10px 18px;
        transition: all 0.3s ease;
    }

    .btn-success.btn-modern {
        background: linear-gradient(135deg, var(--light-green), var(--primary-green));
        border: none;
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
    }
    .btn-success.btn-modern:hover {
        background: linear-gradient(135deg, var(--primary-green), var(--medium-green));
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(16, 185, 129, 0.4);
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

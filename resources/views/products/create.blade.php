@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-success text-white rounded-top-4">
            <h3 class="mb-0">➕ Crear Producto</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <!-- Nombre -->
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <!-- Código de Barras -->
                    <div class="col-md-6">
                        <label for="barcode" class="form-label fw-bold">Código de Barras</label>
                        <input type="text" name="barcode" class="form-control" required>
                        @error('barcode')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="col-12">
                        <label for="description" class="form-label fw-bold">Descripción</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>

                    <!-- Precio -->
                    <div class="col-md-6">
                        <label for="unit_price" class="form-label fw-bold">Precio</label>
                        <input type="number" name="unit_price" class="form-control" step="0.01" required>
                    </div>

                    <!-- Categoría -->
                    <div class="col-md-6">
                        <label for="category_id" class="form-label fw-bold">Categoría</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Seleccione...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sucursal -->
                    <div class="col-md-6">
                        <label for="branch_id" class="form-label fw-bold">Sucursal</label>
                        <select name="branch_id" class="form-select" required>
                            <option value="">Seleccione...</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Características -->
                <hr class="my-4">
                <h5 class="text-success fw-bold">Características</h5>

                <div id="characteristics-container" class="mt-3">
                    <div class="characteristic-row border rounded p-3 mb-3 bg-light">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" name="characteristics[0][name]" placeholder="Nombre" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="characteristics[0][brand]" placeholder="Marca" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="characteristics[0][model]" placeholder="Modelo" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="characteristics[0][size]" placeholder="Tamaño" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="characteristics[0][weight]" placeholder="Peso" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="characteristics[0][material]" placeholder="Material" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="characteristics[0][dimensions]" placeholder="Dimensiones" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="characteristics[0][origin]" placeholder="Origen" class="form-control">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-outline-danger remove-characteristic w-100">❌ Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" id="add-characteristic" class="btn btn-outline-primary mt-2">➕ Añadir característica</button>

                <!-- Botón guardar -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success px-4">💾 Guardar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let index = 1;
document.getElementById('add-characteristic').addEventListener('click', function() {
    const container = document.getElementById('characteristics-container');
    const newRow = document.createElement('div');
    newRow.classList.add('characteristic-row', 'border', 'rounded', 'p-3', 'mb-3', 'bg-light');
    newRow.innerHTML = `
        <div class="row g-2">
            <div class="col-md-4">
                <input type="text" name="characteristics[${index}][name]" placeholder="Nombre" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="characteristics[${index}][brand]" placeholder="Marca" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="text" name="characteristics[${index}][model]" placeholder="Modelo" class="form-control">
            </div>
            <div class="col-md-3">
                <input type="text" name="characteristics[${index}][size]" placeholder="Tamaño" class="form-control">
            </div>
            <div class="col-md-3">
                <input type="text" name="characteristics[${index}][weight]" placeholder="Peso" class="form-control">
            </div>
            <div class="col-md-3">
                <input type="text" name="characteristics[${index}][material]" placeholder="Material" class="form-control">
            </div>
            <div class="col-md-3">
                <input type="text" name="characteristics[${index}][dimensions]" placeholder="Dimensiones" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="text" name="characteristics[${index}][origin]" placeholder="Origen" class="form-control">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-outline-danger remove-characteristic w-100">❌ Eliminar</button>
            </div>
        </div>
    `;
    container.appendChild(newRow);
    index++;
});

document.getElementById('characteristics-container').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-characteristic')) {
        e.target.closest('.characteristic-row').remove();
    }
});
</script>
@endsection

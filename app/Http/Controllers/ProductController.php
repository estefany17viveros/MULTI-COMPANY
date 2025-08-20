<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('products.index', compact('products'));
    }

    // Mostrar formulario para crear un nuevo producto
    public function create()
    {
        return view('products.create');
    }

    // Guardar un nuevo producto en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'barcode' => 'nullable|string|unique:products,barcode',
            'unit_price' => 'required|numeric|min:0',
            'status' => 'required|in:pendiente,aprobado,rechazado',
        ]);

        product::create($validated);

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    // Mostrar un solo producto
    public function show(product $product)
    {
        return view('products.show', compact('product'));
    }

    // Mostrar formulario para editar un producto
    public function edit(product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Actualizar un producto en la base de datos
    public function update(Request $request, product $product)
    {
        $validated = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'barcode' => 'nullable|string|unique:products,barcode,' . $product->id,
            'unit_price' => 'required|numeric|min:0',
            'status' => 'required|in:pendiente,aprobado,rechazado',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar un producto
    public function destroy(product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}

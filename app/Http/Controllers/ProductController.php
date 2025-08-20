<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Http\Request;
use App\Models\characteristics;
use App\Models\category;
use App\Models\branch;

class ProductController extends Controller
{
    public function index()
{
    // Traer todos los productos
    $products = product::all();

    // Retornar la vista con los productos
    return view('products.index', compact('products'));
}





    public function create()
{
    $categories = category::all();
    $branches   = branch::all();
    return view('products.create', compact('categories', 'branches'));
}


    // Guardar un nuevo producto en la base de datos
    public function store(Request $request)
{
    // 1️⃣ Validar
    $request->validate([
        'name' => 'required',
        'barcode' => 'required|unique:products',
        'unit_price' => 'required|numeric',
    ]);

    // 2️⃣ Crear producto
    $product = product::create([
        'name'        => $request->name,
        'description' => $request->description,
        'barcode'     => $request->barcode,
        'unit_price'  => $request->unit_price,
        'category_id' => $request->category_id,
        'branch_id'   => $request->branch_id, // 👈 ahora sí se guarda
    ]);


    // 3️⃣ Crear características y enlazarlas
    if ($request->has('characteristics')) {
        foreach ($request->characteristics as $charData) {
            $characteristic = characteristics::create([
                'name'       => $charData['name'],
                'brand'      => $charData['brand'] ?? null,
                'model'      => $charData['model'] ?? null,
                'size'       => $charData['size'] ?? null,
                'weight'     => $charData['weight'] ?? null,
                'material'   => $charData['material'] ?? null,
                'dimensions' => $charData['dimensions'] ?? null,
                'origin'     => $charData['origin'] ?? null,
                
            ]);

            // 🔗 Guardar en la tabla pivote con category_id
            $product->characteristics()->attach($characteristic->id, [
                'category_id' => $request->category_id // 👈 aquí mandamos el category_id
            ]);
        }
    }

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

<?php

namespace App\Http\Controllers;

use App\Models\characteristics;
use App\Http\Requests\StorecharacteristicsRequest;
use App\Http\Requests\UpdatecharacteristicsRequest;
use Illuminate\Http\Request;

class CharacteristicsController extends Controller
{
    /**
     * Mostrar todas las características.
     */
    public function index()
    {
        $characteristics = characteristics::all();
        return view('characteristics.index', compact('characteristics'));
    }

    /**
     * Mostrar formulario para crear una nueva característica.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Guardar una nueva característica en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'material' => 'nullable|string|max:255',
            'dimensions' => 'nullable|string|max:255',
            'origin' => 'nullable|string|max:255',
        ]);

        characteristics::create($request->only([
            'name', 'brand', 'model', 'size', 'weight', 'material', 'dimensions', 'origin'
        ]));

        return redirect()->route('characteristics.index')
                         ->with('success', 'Característica creada correctamente.');
    }

    /**
     * Mostrar una característica específica.
     */
    public function show(characteristics $characteristic)
    {
        return view('characteristics.show', compact('characteristic'));
    }

    /**
     * Mostrar formulario para editar una característica.
     */
    public function edit(characteristics $characteristic)
    {
        return view('characteristics.edit', compact('characteristic'));
    }

    /**
     * Actualizar una característica en la base de datos.
     */
    public function update(Request $request, characteristics $characteristic)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'material' => 'nullable|string|max:255',
            'dimensions' => 'nullable|string|max:255',
            'origin' => 'nullable|string|max:255',
        ]);

        $characteristic->update($request->only([
            'name', 'brand', 'model', 'size', 'weight', 'material', 'dimensions', 'origin'
        ]));

        return redirect()->route('characteristics.index')
                         ->with('success', 'Característica actualizada correctamente.');
    }

    /**
     * Eliminar una característica.
     */
    public function destroy(characteristics $characteristic)
    {
        $characteristic->delete();

        return redirect()->route('characteristics.index')
                         ->with('success', 'Característica eliminada correctamente.');
    }
}

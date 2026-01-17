<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingrediente;

class IngredienteController extends Controller
{
    public function showAllIngredientes()
    {
        $ingredientes = Ingrediente::all();
        return view('ingredientes.showAllIngredientes', compact('ingredientes'));
    }

    public function showOneIngrediente($id)
    {
        $ingrediente = Ingrediente::findOrFail($id);
        return view('ingredientes.showOneIngrediente', compact('ingrediente'));
    }

    public function create()
    {
        $ingredientes = Ingrediente::all();
        return view('ingredientes.create', compact('ingredientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ],
        [
            'nombre.required' => 'El nombre es obligatorio'
        ]);

        $ingrediente = Ingrediente::create($request->only(['nombre']));

        return redirect()->route('ingredientes.showAllIngredientes');
    }


    public function edit($id)
    {
        $ingrediente = Ingrediente::findOrFail($id);
        return view('ingredientes.edit', compact('ingrediente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required'
        ],
        [
            'nombre.required' => 'El nombre es obligatorio'
        ]);

        $ingrediente = Ingrediente::findOrFail($id);
        $ingrediente->update($request->only(['nombre']));
        
        return redirect()->route('ingredientes.showOneIngrediente', $id);
    }


    public function confirmDelete(Ingrediente $ingrediente)
    {
        return view('ingredientes.confirmDelete', compact('ingrediente'));
    }

    public function destroy(Ingrediente $ingrediente)
    {
        $ingrediente->delete();

        return redirect()
            ->route('ingredientes.showAllIngredientes')
            ->with('success', 'Ingrediente eliminado correctamente');
    }


}

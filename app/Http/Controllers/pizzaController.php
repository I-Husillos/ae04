<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pizza;
use App\Models\Ingrediente;
use Illuminate\Support\Facades\Redirect;

class pizzaController extends Controller
{
    public function showAllPizzas()
    {
        $pizzas = Pizza::all();
        return view('pizzas.showAllPizzas', compact('pizzas'));
    }

    public function showOnePizzas($id)
    {
        $pizza = Pizza::with('ingredientes')->findOrFail($id);

        return view('pizzas.showOnePizza', compact('pizza'));
    }

    public function create()
    {
        $ingredientes = Ingrediente::all();

        return view('pizzas.create', compact('ingredientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'ingredientes' => 'required|array'
        ],
        [
            'nombre.required' => 'El nombre es obligatorio',
            'descripcion.required' => 'La descripcion es obligatorio',
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser un numero',
            'ingredientes.required' => 'Seleccionar al menos un ingrediente',
            'ingredientes.array' => 'Los ingredientes son obligatorios'
        ]);

        $pizza = Pizza::create($request->only(['nombre', 'descripcion', 'precio']));

        if($request->has('ingredientes')){
            $pizza->ingredientes()->attach($request->all('ingredientes'));
        }

        return redirect()->route('pizzas.showAllPizzas');
    }


    public function edit($id)
    {
        $pizza = Pizza::with('ingredientes')->findOrFail($id);
        $ingredientes = Ingrediente::all();

        return view('pizza.edit', compact('pizza', 'ingredientes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'ingredientes' => 'required|array',
        ],
        [
            'nombre.required' => 'El nombre es obligatorio',
            'descripcion.required' => 'La descripcion es obligatorio',
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser un numero',
            'ingredientes.required' => 'Seleccionar al menos un ingrediente',
            'ingredientes.array' => 'Los ingredientes son obligatorios'
        ]);

        $pizza = Pizza::findOrFail($id);

        $pizza->update($request->only(['nombre', 'descripcion', 'precio']));

        $pizza->ingredientes()->sync(
            $request->ingredientes ?? []
        );

        return redirect()->route('pizzas.showOnePizza', $id);
    }

    public function confirmDelete(Pizza $pizza)
    {
        return view('pizzas.confirmDelete', compact('pizza'));
    }

    public function delete(Pizza $pizza)
    {
        $pizza->delete();

        return redirect()
            ->route('pizzas.showAllPizzas')
            ->with('success', 'Pizza eliminada correctamente');
    }

}

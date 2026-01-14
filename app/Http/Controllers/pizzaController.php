<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pizza;
use App\Models\Ingrediente;

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
            'ingredientes' => 'array'
        ],
        [
            'nombre.required' => 'El nombre es requerido',
            'descripcion.required' => 'La descripcion es requerida',
            'precio.required' => 'El precio es requerido',
            'precio.numeric' => 'El precio debe ser numerico',
            'ingredientes.array' => 'Los ingredientes son requeridos'
        ]);

        $pizza = Pizza::create($request->only(['nombre', 'descripcion', 'precio']));

        if($request->has('ingredientes')){
            $pizza->ingredientes()->attach($request->all('ingredientes'));
        }

        return redirect()->route('pizzas.showAllPizzas');
    }

}

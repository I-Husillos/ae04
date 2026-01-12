<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pizza;

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
}

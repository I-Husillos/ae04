<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pizza;
use App\Models\Ingrediente;


class PizzaIgredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizzaMargarita = Pizza::where('nombre', 'Margarita')->first();
        $pizzaCuatroQuesos = Pizza::where('nombre', 'Cuatro Quesos')->first();
        $pizzaPrimavera = Pizza::where('nombre', 'Primavera')->first();

        $mozzarella = Ingrediente::where('nombre', 'Mozarella')->first();
        $jamonSerrano = Ingrediente::where('nombre', 'Jamon serrano')->first();
        $gorgonzolla = Ingrediente::where('nombre', 'Gorgonzolla')->first();
        $provolone = Ingrediente::where('nombre', 'Provolone')->first();
        $tomate = Ingrediente::where('nombre', 'Tomate')->first();
        $rucula = Ingrediente::where('nombre', 'Rúcula')->first();

        $pizzaMargarita->ingredientes()->attach([$tomate->id, $mozzarella->id]);
        $pizzaCuatroQuesos->ingredientes()->attach([$tomate->id, $mozzarella->id, $gorgonzolla->id, $provolone->id]);
        $pizzaPrimavera->ingredientes()->attach([$tomate->id, $mozzarella->id, $jamonSerrano->id, $rucula->id]);
    }
}

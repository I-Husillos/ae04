<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingrediente;


class IgredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ingrediente::create([
            'nombre' => 'Mozarella'
        ]);
        Ingrediente::create([
            'nombre' => 'Jamon serrano'
        ]);
        Ingrediente::create([
            'nombre' => 'Gorgonzolla'
        ]);
        Ingrediente::create([
            'nombre' => 'Provolone'
        ]);
        Ingrediente::create([
            'nombre' => 'Tomate'
        ]);
        Ingrediente::create([
            'nombre' => 'Rúcula'
        ]);
    }
}

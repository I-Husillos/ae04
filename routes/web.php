<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pizzaController;

Route::get('/', [pizzaController::class, 'showAllPizzas'])->name('pizzas.showAllPizzas');
Route::get('/pizza/{id}', [pizzaController::class, 'showOnePizzas'])->name('pizzas.showOnePizza');

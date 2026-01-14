<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pizzaController;

Route::get('/', [pizzaController::class, 'showAllPizzas'])->name('pizzas.showAllPizzas');
Route::get('/pizza/{id}', [pizzaController::class, 'showOnePizzas'])->name('pizzas.showOnePizza');


Route::post('/pizzas', [pizzaController::class, 'store'])->name('pizzas.store');
Route::get('/pizzas/create', [pizzaController::class, 'create'])->name('pizzas.create');

Route::get('/pizzas/{id}/edit', [pizzaController::class, 'edit'])->name('pizzas.edit');
Route::put('/pizzas/{id}', [pizzaController::class, 'update'])->name('pizzas.update');


<?php

use Illuminate\Support\Facades\Route;

Route::get('/saludoescrito', function(){
    return "Esto es un saludo escrito.";
});


Route::get('/saludoescritohtml', function(){
    return "<h1>Esto es un saludo.</h1>
            <p>escrito directamente en la ruta.</p>";
});


Route::get('/saludoersonalizado01/{nombre}', function($nombre){
    return "<h1>Esto es un saludo para $nombre.</h1>";
});

Route::get('/saludoersonalizado02/{nombre?}', function($nombre = null){
    if($nombre){
        return "<h1>Esto es un saludo para $nombre.</h1>";
    } else {
        return "<h1>Esto es un saludo para desconocido.</h1>";
    }
});


Route::get('/saludoersonalizado02/{nombre?}/{edad?}', function($nombre = null, $edad = null){
    if($nombre && $edad){
        return "<h1>$nombre tiene $edad años.</h1>";
    } elseif($nombre && !$edad){
        return "<h1>$nombre no tiene edad.</h1>";
    } elseif(!$nombre && $edad){
        return "<h1>Desconocido tiene $edad años.</h1>";
    } else {
        return "<h1>Desconocido no tiene edad.</h1>";
    }
});


Route::get('/', function () {
    return view('welcome');
});

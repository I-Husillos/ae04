<h1>Eliminar Ingrediente</h1>

<p>
    ¿Estás seguro de que deseas eliminar el ingrediente 
    <strong>"{{ $ingrediente->nombre }}"?</strong>
</p>

<form method="POST" action="{{ route('ingredientes.destroy', $ingrediente) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
    <a href="{{ route('ingredientes.showAllIngredientes') }}">Cancelar</a>
</form>
<h1>Eliminar Pizza</h1>

<p>
    ¿Estás seguro de que deseas eliminar la pizza 
    <strong>"{{ $pizza->nombre }}"?</strong>
</p>

<form method="POST" action="{{ route('pizzas.destroy', $pizza) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
    <a href="{{ route('pizzas.showAllPizzas') }}">Cancelar</a>
</form>
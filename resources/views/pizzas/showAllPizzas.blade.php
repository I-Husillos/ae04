<table>
    <tr>
        <th>Pizza</th>
        <th>Precio</th>
    </tr>
    @foreach ($pizzas as $pizza)
        <tr>
            <td><a href="{{ route('pizzas.showOnePizza', $pizza->id) }}">{{$pizza->nombre}}</a></td>
            <td>{{$pizza->precio}}</td>
            <td><a href="{{ route('pizzas.edit', $pizza->id) }}">Editar</a></td>
            <td><a href="{{ route('pizzas.confirmDelete', $pizza->id) }}">Eliminar</a></td>

        </tr>
    @endforeach
</table>


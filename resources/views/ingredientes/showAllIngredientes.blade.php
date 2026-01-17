@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif


<table>
    <tr>
        <th>Pizza</th>
        <th>Precio</th>
    </tr>
    @foreach ($ingredientes as $ingrediente)
        <tr>
            <td><a href="{{ route('ingredientes.showOnePizza', $ingrediente->id) }}">{{$ingrediente->nombre}}</a></td>
            <td>{{$ingrediente->precio}}</td>
            <td><a href="{{ route('ingredientes.edit', $ingrediente->id) }}">Editar</a></td>
            <td><a href="{{ route('ingredientes.confirmDelete', $ingrediente->id) }}">Eliminar</a></td>
        </tr>
    @endforeach
</table>


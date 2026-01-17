<h1>Editar Ingrediente</h1>

@if($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('ingredientes.update', $ingrediente->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="nombre" value="{{ $ingrediente->nombre }}">

    <button type="submit">Actualizar</button>
</form>
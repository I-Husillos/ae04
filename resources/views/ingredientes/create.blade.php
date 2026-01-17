@include('layout.menu')
<h1>Nuevo ingrediente</h1>

@if($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('ingredientes.store') }}">
    @csrf
    
    <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">

    <button type="submit">Crear</button>
</form>
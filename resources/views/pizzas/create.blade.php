@include('layout.menu')
<h1>Nueva pizza</h1>

@if($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif



<form method="POST" action="{{ route('pizzas.store') }}">
    @csrf
    
    <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">

    <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>

    <input type="number" name="precio" step="0.01" value="{{ old('precio') }}">

    <h3>Ingredientes</h3>
    @foreach ($ingredientes as $ingrediente)
        <lavel>
            <input type="checkbox" name="ingredientes[]" value="{{ $ingrediente->id }}" {{in_array($ingrediente->id, old('ingredientes', [])) ? 'checked' : ''}}>
            {{ $ingrediente->nombre }}
        </label><br>
    @endforeach

    <button type="submit">Crear</button>
</form>
@extends('layouts.app')

@section('main-content')
    <a href={{ route('actor.index') }} class="button">Volver</a>
    <form action={{ route('actor.store') }} method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
        </div>
        <button type="submit" class="button">
            Crear
        </button>
    </form>
@endsection

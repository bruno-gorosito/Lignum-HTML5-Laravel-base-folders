@extends('layouts.app')

@section('main-content')
    <a href={{ route('pelicula.index') }} class="button">Volver</a>
    <form action={{ route('pelicula.store') }} method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo">
        </div>

        <div class="form-group">
            <div class="">
                <label for="duracion">Duración:</label>
                <input type="number" name="duracion" id="duracion">
            </div>
            <div class="">
                <label for="anio">Año de lanzamiento:</label>
                <input type="number" name="anio" id="anio">
            </div>
        </div>
        <div class="form-group">
            <label for="sipnosis">Sipnosis:</label>
            <input type="text" name="sipnosis" id="sipnosis">
        </div>
        <div class="form-group">
            <label for="actorprincipal">Actor princial:</label>
            <select name="actorprincipal" id="actorprincipal">
                @foreach ($actors as $actor)
                    <option value={{ $actor->id }}>{{ $actor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="imagen">Portada:</label>
            <input type="file" name="imagen" id="imagen">
        </div>
        <button type="submit" class="button">
            Crear
        </button>
    </form>
@endsection

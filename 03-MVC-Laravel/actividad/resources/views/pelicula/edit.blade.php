@extends('layouts.app')

@section('main-content')
    <a href={{ route('pelicula.index') }} class="button">Volver</a>
    <form action="{{ route('pelicula.update', ['pelicula' => $pelicula]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="{{ $pelicula->titulo }}">
        </div>

        <div class="form-group">
            <div class="">
                <label for="duracion">Duración:</label>
                <input type="number" name="duracion" id="duracion" value="{{ $pelicula->duracion }}">
            </div>
            <div class="">
                <label for="anio">Año de lanzamiento:</label>
                <input type="number" name="anio" id="anio" value="{{ $pelicula->anio }}">
            </div>
        </div>
        <div class="form-group">
            <label for="sipnosis">Sipnosis:</label>
            <input type="text" name="sipnosis" id="sipnosis" value="{{ $pelicula->sipnosis }}">
        </div>
        <div class="form-group">
            <label for="actorprincipal">Actor princial:</label>
            <select name="actorprincipal" id="actorprincipal">
                @foreach ($actors as $actor)
                    <option value="{{ $actor->id }}" @if ($actor->id == $pelicula->actorprincipal->id) selected @endif>{{ $actor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="imagen">Portada:</label>
            <input type="file" name="imagen" id="imagen">
        </div>
        <img src={{ asset('storage/' . '/' . $pelicula->imagen) }} alt="Imagen de pelicua {{ $pelicula->titulo }}"
            srcset="">
        <button type="submit" class="button">
            Editar
        </button>
    </form>
@endsection

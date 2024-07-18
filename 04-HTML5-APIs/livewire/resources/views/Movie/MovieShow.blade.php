@extends('layouts.app')

@section('main-content')
    <a href={{ route('pelicula.index') }} class="button">Ver peliculas</a>
    <div class="container">
        <img src={{ asset('storage/') . '/' . $pelicula->imagen }} alt="Imagen de pelicula {{ $pelicula->titulo }}"
            class="imagen-principal">
        <div class="info-peli">
       
            <h2>{{ $pelicula->titulo }}</h2>
            <p><span>Duración: </span>{{ $pelicula->duracion }}</p>
            <p><span>Año lanzamiento:</span> {{ $pelicula->anio }}</p>
            <p><span>Actor principal: </span>{{ $pelicula->actorprincipal->nombre }}</p>
            <p><span>Sipnosis: </span>{{ $pelicula->sipnosis }}</p>
            <form action="{{route('pelicula.destroy', ['pelicula' => $pelicula->id])}}" method="post">
                @method('delete')
                @csrf
                <a href={{ route('pelicula.edit', ['pelicula' => $pelicula]) }} class="button editar">Editar</a>
                <button class="button eliminar">Eliminar</button>
            </form>
        </div>
    </div>

@endsection

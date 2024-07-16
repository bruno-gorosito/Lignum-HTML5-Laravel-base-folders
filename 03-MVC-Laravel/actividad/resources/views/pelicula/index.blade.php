@extends('layouts.app')

@section('main-content')
    <a href={{ route('pelicula.create') }} class="button">Añadir pelicula</a>
    <a href={{ route('actor.index') }} class="button">Ver actores</a>

    <div class="card-container">
        @foreach ($peliculas as $pelicula)
            <x-card :$pelicula />
        @endforeach
    </div>

    <h2>Peliculas favoritas</h2>
    <div class="card-container favoritos">
        @foreach ($peliculasFavoritas as $pelicula)
        <x-card :pelicula="$pelicula" />
        @endforeach
    </div>
    <script>
        let peliculasFavoritas = @js($peliculasFavoritas)
    </script>
    <script src="/js/app.js"></script>
@endsection

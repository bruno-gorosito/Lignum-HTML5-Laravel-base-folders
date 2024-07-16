@extends('layouts.app')

@section('main-content')
    <a href={{ route('actor.create') }} class="button">Crear actor</a>
    <a href={{ route('pelicula.index') }} class="button">Ver peliculas</a>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nacimiento</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actors as $actor)
                <tr>
                    <td>{{ $actor->nombre }}</td>
                    <td>{{ $actor->fecha_nacimiento }}</td>
                    <td><a href="{{route('actor.show', ['actor' => $actor])}}">Ver más</a></td>
                    <td><button onclick="eliminarActor({{$actor}})">Eliminar</button></td>
                </tr>
            @endforeach

        </tbody>

    </table>

    <script src="/js/app.js"></script>
@endsection

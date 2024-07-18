@extends('layouts.app')

@section('main-content')
    <a href="{{ url('movie/create') }}" class="button">Crear pelicula</a>
    <a href="{{ url('actor') }}" class="button">Ver actores</a>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Lanzamiento</th>
                <th>Duración</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->MovieTitle }}</td>
                    <td>{{ $movie->MovieYear ?? 'N/A' }}</td>
                    <td>{{ $movie->MovieLength ?? 'N/A' }}</td>
                    <td><a href="" class="plain-text">Ver</a> | <a href="" class="plain-text">Editar </a>
                        | <form action=""><button class="plain-text">Eliminar</button></form>
                    </td>
                </tr>
            @endforeach
        </tbody>

        @livewire('modal-update', ['title' => 'Hola'])
    </table>
@endsection

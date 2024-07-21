@extends('layouts.app')

@section('main-content')
    <a href="{{ url('actor/create') }}" class="button">Crear actor</a>
    <a href="{{ url('movie') }}" class="button">Ver peliculas</a>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha de nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actors as $actor)
                <tr id="A-{{ $actor->ActorID }}">
                    <td>{{ $actor->ActorName }}</td>
                    <td>{{ $actor->ActorBirthday }}</td>
                    <td><span onclick="modalVerActor({{ $actor->ActorID }})">Ver</span> |
                        <span onclick="modalEditarActor({{ $actor->ActorID }})">Editar</span> |
                        <span onclick="eliminarActor()">Eliminar</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection



<script>
    let modal = false;

    function modalVerActor(id) {
        $.ajax({
            url: `/actor/${id}`,
            type: 'get',
            success: data =>
                cargarContenidoModal(data)

        })
    }

    function modalEditarActor(id) {
        $.ajax({
            url: `/actor/${id}/edit`,
            type: 'get',
            success: data =>
                cargarContenidoModal(data)

        })
    }

    function cargarContenidoModal(content) {
        let main = document.querySelector('#main')
        main.innerHTML += content

    }
</script>



@extends('layouts.app')

@section('main-content')

<a href="{{url('actor/create')}}" class="button">Crear actor</a>
<a href="{{url('movie')}}" class="button">Ver peliculas</a>
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
                <tr>
                    <td>{{$actor->ActorName}}</td>
                    <td>{{$actor->ActorBirthday}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
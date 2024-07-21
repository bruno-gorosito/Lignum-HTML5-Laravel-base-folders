@extends('layouts.app')

@section('main-content')
    <a href="{{ url('movie/create') }}" class="button">Crear pelicula</a>
    <a href="{{ url('actor') }}" class="button">Ver actores</a>


    @livewire('table-movie')
@endsection

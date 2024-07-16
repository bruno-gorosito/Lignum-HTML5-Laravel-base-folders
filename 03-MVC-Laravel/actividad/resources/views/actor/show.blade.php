@extends('layouts.app')
@section('main-content')
    <h2>{{ $actor->nombre }}</h2>
    <h3>{{ $actor->fecha_nacimiento }}</h3>
    
@endsection

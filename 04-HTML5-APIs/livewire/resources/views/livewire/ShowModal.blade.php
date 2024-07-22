<img src="{{ asset($image) }}" alt="Imagen de pelicula {{ $title }}" class="imagen-principal">
<div class="info-peli">

    <h2>{{ $title }}</h2>
    <p><span>Duración: </span>{{ $length }} minutos</p>
    <p><span>Año lanzamiento:</span> {{ $year }}</p>
    <p><span>Actor principal: </span>{{ $actorPrincipal->ActorName }}</p>
    {{-- <p><span>Sipnosis: </span>{{ $pelicula->sipnosis }}</p> --}}

</div>

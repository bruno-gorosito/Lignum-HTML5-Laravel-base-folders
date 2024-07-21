<form action="">
    <h2>Editar Pelicula</h2>
    @csrf
    <div class="form-group">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo" wire:model.live="title">
        @error('title')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <div class="">
            <label for="duracion">Duración:</label>
            <input type="number" name="duracion" id="duracion" wire:model="length">
        </div>
        <div class="">
            <label for="anio">Año de lanzamiento:</label>
            <input type="number" name="anio" id="anio" wire:model="year">
        </div>
    </div>
    <div class="form-group">
        <label for="actorprincipal">Actor principal:</label>
        <select name="actorprincipal" id="actorprincipal" wire:model="actorPrincipal">
            @foreach ($actors as $actor)
                <option value="{{ $actor->ActorID }}">
                    {{ $actor->ActorName }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="imagen">Portada:</label>
        <input type="file" name="imagen" wire:model="newImage">
    </div>
    <div class="form-group btn">
        <button wire:click.prevent="cerrarModal()" class="button">Cancelar</button>
        <button type="submit" wire:click.prevent="editMovie({{ $movieID }})" class="button">
            Guardar cambios
        </button>
    </div>
</form>
<img src="{{ $newImage?->temporaryURL() ?? asset($image) }}" style="object-fit: cover" alt="" id="image">

<div class="modal-container" id="modal">
    <div class="modal">
        <form method="POST" onsubmit="editActor(event, {{ $actor->ActorID }})" style="min-width: 400px">
            <h2>Editar {{ $actor->ActorName }}</h2>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ $actor->ActorName }}">

            </div>

            <div class="form-group">
                <label for="birthday">Cumpleaños:</label>
                <input type="date" name="birthday" value="{{ $actor->ActorBirthday }}">
            </div>
            <div class="form-group btn">
                <button onclick="cerrarModal()" class="button">Cancelar</button>
                <button type="submit" class="button">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
    <div class="bg-black" onclick="cerrarModal()"></div>
</div>

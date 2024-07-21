<div class="modal-container" id="modal">
    <div class="modal">
        <div class="info-peli">

            <h2>{{ $actor->ActorName }}</h2>
            <p><span>Cumpleaños: </span>{{ $actor->ActorBirthday }}</p>

        </div>
    </div>
    <div class="bg-black" onclick="cerrarModal()"></div>
</div>

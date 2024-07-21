<div class="">
    <table>

        <thead>
            <tr>
                <th>Titulo</th>
                <th>Lanzamiento</th>
                <th>Duración</th>
                <th>Acciones</th>
            </tr>
        </thead>
        @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->MovieTitle }}</td>
                <td>{{ $movie->MovieYear ?? 'N/A' }}</td>
                <td>{{ $movie->MovieLength ?? 'N/A' }}</td>
                <td><span wire:click="modalVer({{ $movie->MovieID }})">Ver</span> |
                    <span wire:click="modalEditar({{ $movie->MovieID }})">Editar</span> |
                    <span wire:click="eliminar()">Eliminar</span>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    @if ($modal)
        <div class="modal-container">
            <div class="modal">
                @switch($typeModal)
                    @case('show')
                        @include('livewire.ShowModal')
                    @break

                    @case('edit')
                        @include('livewire.editmodal')
                    @break
                @endswitch
            </div>
            <div class="bg-black" wire:click="cerrarModal()"></div>
        </div>
    @endif
</div>

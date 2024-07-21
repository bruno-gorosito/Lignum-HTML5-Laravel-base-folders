

let imagen = document.querySelector('#imageMovieEdit')

function cerrarModal() {
    let modalDiv = document.querySelector('#modal')
    modalDiv.remove()
    modal = false;
}


function editActor(event, id) {
    event.preventDefault()
    let form = event.target
    $.ajax({
        type: 'PUT',
        url: `/actor/${id}`,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: JSON.stringify({
            ActorName: form.elements['name'].value,
            ActorBirthday: form.elements['birthday'].value
        }),
        success: data => {
            let tr = $(`#A-${id}`)[0]
            tr.innerHTML = `<td>${data.ActorName}</td>
                            <td>${data.ActorBirthday}</td>
                            <td><span onclick="modalVerActor(${data.ActorID})">Ver</span> |
                                <span onclick="modalEditarActor(${data.ActorID})">Editar</span> |
                                <span onclick="eliminar(${data.ActorID})">Eliminar</span>
                            </td>`
            },
            reject: error => console.log(error)
    })
    cerrarModal()
}



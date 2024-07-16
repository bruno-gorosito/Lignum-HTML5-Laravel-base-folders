var btnFav = document.querySelectorAll('svg');

btnFav.forEach(button => {
    button.addEventListener('click', function () {
        const id = this.getAttribute('data-id')
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch(`/pelicula/${id}/updateFav`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
        })
            .then(response =>
                response.json())
            .then(data => {
                button.classList.toggle('favorito', data.favorito);
                modificarFavoritos(data)
            })

    })
});

function modificarFavoritos(data) {
    let cardContainer = document.querySelector('.card-container.favoritos');
    if (data.favorito) {

        let newCard = document.createElement('div');
        newCard.classList.add('card');
        newCard.setAttribute('data-id', data.id)

        newCard.innerHTML = `
        <a href="/pelicula/${data.id}">
            <img src="/storage/${data.imagen}" alt="Imagen de ${data.titulo}">
            <div class="info">
                <h3>${data.titulo}</h3>
                <p>${data.duracion} Minutos</p>
            </div>
        </a>
        <svg viewBox="0 0 30 30" fill="none" data-id="${data.id}" xmlns="http://www.w3.org/2000/svg"
            class="heart ${data.favorito ? 'favorito' : ''}">
            <path
                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                stroke-linecap="round" stroke-linejoin="round" class="heart-out" />
            <path
                d="M12.33 17.45C12.15 17.51 11.84 17.51 11.66 17.45C10.1 16.92 6.59998 14.69 6.59998 10.91C6.59998 9.24 7.93998 7.89001 9.59998 7.89001C10.58 7.89001 11.45 8.36001 12 9.10001C12.54 8.37001 13.42 7.89001 14.4 7.89001C16.06 7.89001 17.4 9.24 17.4 10.91C17.4 14.69 13.9 16.92 12.33 17.45Z"
                stroke-linecap="round" stroke-linejoin="round" class="heart-in" />
        </svg>
    `;

        cardContainer.appendChild(newCard);
    } else {
        let childrenCards = cardContainer.children;

        for (let index = 0; index < childrenCards.length; index++) {
            const id = childrenCards.item(index).getAttribute('data-id')
            if (id == data.id) {
                childrenCards.item(index).remove()
            }
        }
    }
    
}






function eliminarActor(actor){ 
    
    $.ajax({
        url: `/actor/${actor.id}`,
        type: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: response => {
            console.log('wao');
        }
    });
}
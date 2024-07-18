function showActor(id) {
    
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
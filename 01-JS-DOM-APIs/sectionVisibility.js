
section = document.getElementById('hidden-section')

document.addEventListener('DOMContentLoaded', () => {
    section.classList.toggle('visible')
})


function ajaxCalls(config) {
    return new Promise((resolve, reject) => {
        let xhr = new XMLHttpRequest()
        xhr.open(config.method, config.url)
        xhr.send()


        xhr.onload = function () {


            if (xhr.status == 200) {
                resolve({
                    status: xhr.status,
                    statusText: xhr.statusText,
                    data: JSON.parse(xhr.response)
                })
            } else {
                reject({
                    status: xhr.status,
                    statusText: xhr.statusText
                })
            }
        }

        xhr.onerror = function () {
            reject({
                status: xhr.status,
                statusText: xhr.statusText
            })
        }

    })
}


const llamarAChuck = async () => {
    try {
        const response = await ajaxCalls({
            method: 'get',
            url: 'https://api.chucknorris.io/jokes/random'
        })
        section.innerText = `Chuck Norris dice: "${response.data.value}"`
        if (response.status == 200) {
        }
    } catch (error) {
        section.innerText = `Error al alertar a Chuck Norris.`
        section.style.color = 'red'
        section.style.transform = 'scale(2)'
    }

}


const consultarRepositorios = async () => {

    const search = document.getElementById('busqueda').value

    const data = await ajaxCalls({
        method: 'get',
        url: `https://api.github.com/search/repositories?q=${search || 'javascript'}`
    }).then((response) => {
        return response.data.items
    }).catch(error => {
        console.log(error);
    })


    const ul = document.getElementById('listado')
    ul.innerHTML = ""
    for (item of data) {
        let li = document.createElement('li')
        li.innerText = item.name
        ul.appendChild(li)
    }

}

let matrizNueva = generadorMatriz(4, 3);
generadorTabla(matrizNueva);


function generadorMatriz(ancho, alto) {
    let matriz = []
    for (let index = 0; index < alto; index++) {
        let column = []
        for (let secondIndex = 0; secondIndex < ancho; secondIndex++) {
            column.push(parseInt(Math.random() * 100));
        }
        matriz.push(column)
    }
    return matriz;
}


function generadorTabla(matriz) {
    const section = document.getElementById('table-section');
    const table = document.createElement('table');
    const tbody = document.createElement('tbody');
    for (let index = 0; index < matriz.length; index++) {
        let tr = document.createElement('tr');
        for (let secondIndex = 0; secondIndex < matriz[index].length; secondIndex++) {
            let td = document.createElement('td');
            let text = document.createTextNode(matriz[index][secondIndex]);
            td.appendChild(text);
            tr.appendChild(td);
        };
        tbody.appendChild(tr);
    };
    table.appendChild(tbody);
    table.setAttribute('border', 1);
    section.appendChild(table);

}
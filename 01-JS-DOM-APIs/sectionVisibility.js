
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

        xhr.onerror = function() {
            reject({
                status: xhr.status,
                statusText: xhr.statusText
            })
        }

    })
}


const llamarAChuck = async() => {
    try {
        const response = await ajaxCalls({
            method: 'get',
            url: 'https://api.chucknorris2.io/jokes/random'
        })
    
        if (response.status == 200) {
            section.innerText = `Chuck Norris dice: "${response.data.value}"`
        }
    } catch (error) {
        section.innerText = `Error al alertar a Chuck Norris.`
        section.style.color = 'red'
    }


}
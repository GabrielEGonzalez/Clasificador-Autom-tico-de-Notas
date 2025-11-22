let conte = document.getElementById('conte');

document.getElementById('miContenido').addEventListener('submit', function (event) {
    event.preventDefault();

    fetch('procesarPalabra.php', {
        method: 'POST',
        body: new FormData(this)
    }).then(res => res.json()).then(data => {
        Swal.fire({
            title: '¡Registro Exitoso!',
            text: data.message,
            icon: 'success', // Muestra un checkmark verde
            confirmButtonText: 'Aceptar'
        });
        conte.innerHTML = "";
        if (Array.isArray(data.datos)) {
            conte.innerHTML = data.datos.map(item => `<div>Título: ${item.titulo || 'N/A'}, Contenido: ${item.contenido || 'N/A'}</div>`).join('');
        } else {
            conte.innerHTML = JSON.stringify(data, null, 2); // Formato JSON legible
        }
    }).catch(err => {
        console.error('Error:', err);
    });
});

window.onload = function MostrarNotas() {
    // El script se mantiene igual, aunque podrías añadir un indicador de carga
    fetch('procesarPalabra.php')
        .then(res => {
            if (!res.ok) {
                throw new Error(`Error HTTP: ${res.status}`);
            }
            return res.json();
        })
        .then(data => {
            console.log(data);
            // Mostrar datos de manera más legible si es un array de objetos
            conte.innerHTML = "";
            //conte.innerHTML = data;
            // Crear tarjeta HTML
            data.forEach(nota => {

                // Crear tarjeta HTML
                const card = `
                     <div class="nota-card cat-${nota.categoria}">
        <span class="categoria">${nota.categoria}</span>
        <h3>${nota.titulo}</h3>
        <p>${nota.contenido}</p>
    </div>
                `;

                // Agregar al contenedor
                conte.innerHTML += card;
            });
        })
        .catch(error => {
            console.error('Error al cargar los datos:', error);
            conte.innerHTML = `<p style="color: red;">No se pudieron cargar los datos. Verifique 'procesarPalabra.php'.</p>`;
        });
}

function getColor(categoria) {
    const colores = {
        FINANZAS: "#4CAF50",
        EVENTOS_SOCIAL: "#FF9800",
        ESTUDIOS_TAREAS: "#3F51B5",
        ESTUDIOS: "#673AB7",
        SALUD: "#E91E63",
        COMPRAS: "#009688"
    };
    return colores[categoria] || "#4a90e2";
}

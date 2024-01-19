"use strict"

function confirmarBorrado(id) {
    if (confirm("¿Seguro que quieres borrar este Pokémon?")) {
        window.location.href = 'borrar-pokemon.php?id=' + id;
    }
}

// Año footer
document.getElementById("year").textContent = new Date().getFullYear();


function obtenerEstacion() {
    const mesActual = new Date().getMonth() + 1; // Enero = 1, Febrero = 2, etc.
    if (mesActual >= 3 && mesActual <= 5) {
        return 'primavera';
    } else if (mesActual >= 6 && mesActual <= 8) {
        return 'verano';
    } else if (mesActual >= 9 && mesActual <= 11) {
        return 'otoño';
    } else {
        return 'invierno';
    }
}

function aplicarEstilosPorEstacion() {
    const estacion = obtenerEstacion();
    let color;

    switch(estacion) {
        case 'primavera':
            color = 'pink';
            break;
        case 'verano':
            color = 'green';
            break;
        case 'otoño':
            color = 'orange';
            break;
        case 'invierno':
            color = 'blue';
            break;
    }

    // Cambiar el color del botón específico
    const botonCrearPokemon = document.querySelector('.btn-crear-pokemon');
    if (botonCrearPokemon) {
        botonCrearPokemon.style.backgroundColor = color;
    }
}

// Aplicar los estilos al cargar la página
window.onload = aplicarEstilosPorEstacion;

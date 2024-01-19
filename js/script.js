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


window.onload = function() {
    var savedColor = getCookie("mainColor");
    if (savedColor) {
        changeColor(savedColor);
    }

    document.getElementById("colorPicker").addEventListener("input", function() {
        var selectedColor = this.value;
        changeColor(selectedColor);
        setCookie("mainColor", selectedColor, 30);
    });
};

function changeColor(color) {
    // Cambiar el color de fondo de los elementos con la clase 'colorizable'
    var elements = document.getElementsByClassName("colorizable");
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.backgroundColor = color;
    }
}

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
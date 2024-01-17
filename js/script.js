"use strict"

function confirmDelete(pokemon) {
    if (confirm("¿Estás seguro de que quieres borrar a " + pokemon.name + "?")) {
        window.location.href = 'borrar-pokemon.php?id=' + pokemon.id;
    }
}

    document.getElementById("year").textContent = new Date().getFullYear();

"use strict"
function confirmarBorrado(id) {
    if (confirm("¿Seguro que quieres borrar este Pokémon?")) {
        window.location.href = 'borrar-pokemon.php?id=' + id;
    }
}

// Año footer
document.getElementById("year").textContent = new Date().getFullYear();

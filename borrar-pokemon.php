<?php
include 'Conexion/conexion.php';

// Verifica si recibe un ID y es numerico
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pokemonId = $_GET['id'];

    // Prepara consulta de borrado
    $stmt = $conexion->prepare("DELETE FROM pokemons WHERE id = ?");
    $stmt->bind_param("i", $pokemonId);

    if ($stmt->execute()) {
        echo "Pokémon borrado con éxito.";
        // Redirige despues de borrar el Pokémon
        header("Location: 003pkms.php");
        exit;
    } else {
        echo "Error al borrar el Pokémon.";
    }

    $stmt->close();
} else {
    echo "ID no válido.";
}

$conexion->close();


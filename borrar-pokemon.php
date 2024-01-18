<?php
include 'Conexion/conexion.php';

// Verifica si recibe un ID y es numérico
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pokemonId = $_GET['id'];

    // Primero, elimina registros relacionados en imagenes_pokemon
    $stmtImagenes = $conexion->prepare("DELETE FROM imagenes_pokemon WHERE pokemon_id = ?");
    $stmtImagenes->bind_param("i", $pokemonId);

    if (!$stmtImagenes->execute()) {
        echo "Error al borrar las imágenes asociadas al Pokémon.";
        $stmtImagenes->close();
        $conexion->close();
        exit;
    }

    $stmtImagenes->close();

    // Luego, elimina el registro en pokemons
    $stmtPokemon = $conexion->prepare("DELETE FROM pokemons WHERE id = ?");
    $stmtPokemon->bind_param("i", $pokemonId);

    if ($stmtPokemon->execute()) {
        echo "Pokémon borrado con éxito.";
        // Redirige después de borrar el Pokémon
        header("Location: 003pkms.php");
        exit;
    } else {
        echo "Error al borrar el Pokémon.";
    }

    $stmtPokemon->close();
} else {
    echo "ID no válido.";
    header("Location: 003pkms.php");

}
$conexion->close();
?>

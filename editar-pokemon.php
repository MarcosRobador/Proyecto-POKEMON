<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    
  <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Pokémon</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
          </ul>
        </div>
      </nav>
  </header>

  <?php
  include 'Conexion/conexion.php';

  // Verifica si se recibe un ID y es numerico
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      $pokemonId = $_GET['id'];

    // Procesa el formulario de edicion
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $type = $_POST['type'] ?? '';
    $subtype = $_POST['subtype'] ?? '';
    $region = $_POST['region'] ?? '';

    // Prepara consulta de actualizacion
    $stmt = $conexion->prepare("UPDATE pokemons SET name = ?, type = ?, subtype = ?, region = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $name, $type, $subtype, $region, $pokemonId);

  if ($stmt->execute()) {
            echo "Pokémon actualizado con éxito.";

            header("Location: 003pkms.php");
            exit;
        } else {
            echo "Error al actualizar el Pokémon.";
        }

        $stmt->close();
        $conexion->close();
        return;
    }

   // Obtiene datos del pokemon para el formulario, incluyendo la URL de la imagen
   $stmt = $conexion->prepare("SELECT pokemons.*, imagenes_pokemon.url_imagen FROM pokemons LEFT JOIN imagenes_pokemon ON pokemons.id = imagenes_pokemon.pokemon_id WHERE pokemons.id = ?");
   $stmt->bind_param("i", $pokemonId);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows === 1) {
       $pokemon = $result->fetch_assoc();
       ?>

  <div class="form-editar" >
    <!-- Formulario de edicion -->
    <form action="editar-pokemon.php?id=<?php echo $pokemonId; ?>" method="post">
    
    <h3><?php echo htmlspecialchars($pokemon['name']); ?></h3>
    <input type="hidden" name="name" value="<?php echo htmlspecialchars($pokemon['name']); ?>">

    Tipo: 
    <select name="type">
        <?php
        $tipos = ['Fire', 'Water', 'Grass', 'Electric', 'Psychic', 'Normal', 'Ice', 'Dragon', 'Dark', 'Fairy', 'Fighting', 'Flying', 'Poison', 'Ground', 'Rock', 'Bug', 'Ghost', 'Steel'];
        foreach ($tipos as $tipo) {
            echo "<option value=\"$tipo\"".($pokemon['type'] == $tipo ? ' selected' : '').">".ucfirst($tipo)."</option>";
        }
        ?>
    </select><br>
    
    Subtipo: 
    <select name="subtype">
        <option value="" <?php echo $pokemon['subtype'] == '' ? 'selected' : ''; ?>>Ninguno</option>
        <?php
        foreach ($tipos as $tipo) {
            echo "<option value=\"$tipo\"".($pokemon['subtype'] == $tipo ? ' selected' : '').">".ucfirst($tipo)."</option>";
        }
        ?>
    </select><br>
    
    Región: 
    <select name="region">
        <?php
        $regiones = ['Kanto', 'Johto', 'Hoenn', 'Sinnoh', 'Unova', 'Kalos', 'Alola', 'Galar', 'Hisui'];
        foreach ($regiones as $region) {
            echo "<option value=\"$region\"".($pokemon['region'] == $region ? ' selected' : '').">".ucfirst($region)."</option>";
        }
        ?>
    </select><br>
    
    <input type="submit" value="Actualizar">
  </form>

   <!-- Muestra la imagen del Pokémon -->
   <img src="<?php echo htmlspecialchars($pokemon['url_imagen']); ?>" alt="Imagen de <?php echo htmlspecialchars($pokemon['name']); ?>">
  </div>

  <?php
    } else {
        echo "Pokémon no encontrado.";
    }

    $stmt->close();
  } else {
    echo "ID no válido.";
  }

  $conexion->close();
  ?>
  
  <div class="container-footer">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="d-flex flex-grow-1 justify-content-start align-items-center">
        <a href="/" class="text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <span class="text-muted">©Copyright Proyecto Pokémon <span id="year"></span></span>
    </footer>
  </div>

</body>
<script src="js/script.js" ></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3UDkPWsVZ4nT4G8/61EZTx" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
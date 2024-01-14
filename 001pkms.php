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
      <a class="navbar-brand" href="#">Pokémon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">XXX</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">XXX</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">XXX</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="imagen-fondo" id="#inicio">
    <img src="img/imagen-fondo.png" alt="fondo">
  </div>

  <div class="pokemon-list">
    <h1>Pokemones</h1>
    <?php
    // Incluye el archivo de conexion
    include 'Conexion/conexion.php';

    // Consulta, todos los pokemon
    $sql = "SELECT id, name, type, subtype, region FROM pokemons";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Convierte los datos en un array
        $pokemons = $result->fetch_all(MYSQLI_ASSOC);

        // Lista cada pokemon usando foreach
        foreach ($pokemons as $pokemon) {
            echo "ID: " . $pokemon["id"] . " - Nombre: " . $pokemon["name"] . " - Tipo: " . $pokemon["type"];
            if (!empty($pokemon["subtype"])) {
                echo " - Subtipo: " . $pokemon["subtype"];
            }
            echo " - Región: " . $pokemon["region"];
            // Botones de Editar y Borrar
            echo "<a href='editar-pokemon.php?id=" . $pokemon["id"] . "' class='btn-editar'>Editar</a>";
            echo "<a href='borrar-pokemon.php?id=" . $pokemon["id"] . "' class='btn-borrar'>Borrar</a><br>";

        }
    } else {
        echo "0 Pokémon encontrados";
    }

    $conexion->close();
    ?>
</div>



<div class="container-footer">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="d-flex flex-grow-1 justify-content-start align-items-center">
        <a href="/" class="text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <span class="text-muted">© 2024 Marcos Robador Mateos</span>
      </div>
  
      <ul class="nav d-flex justify-content-end list-unstyled">
        <li class="espacio-icono"><a class="text-muted" href="tu-enlace-a-instagram"><i class="fab fa-instagram"></i></a></li>
        <li class="espacio-icono"><a class="text-muted" href="https://www.linkedin.com/in/marcos-robador-mateos-7b3484252/"><i class="fab fa-linkedin"></i></a></li>
        <li class="espacio-icono"><a class="text-muted" href="https://github.com/MarcosRobador"><i class="fab fa-github"></i></a></li>
      </ul>
    </footer>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3UDkPWsVZ4nT4G8/61EZTx" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
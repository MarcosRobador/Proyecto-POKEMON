<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon</title>
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

  <?php
    include 'Conexion/conexion.php';

    // Comprueba si 'ordenar_por' esta en la URL. Si esta presente, usa su valor
    // Si no esta, establece 'name' como valor por defecto
    $ordenar_por = isset($_GET['ordenar_por']) ? $_GET['ordenar_por'] : 'name';

    // Comprueba si 'direccion' esta y es igual a 'desc'
    // Si es asi, establece la variable $direccion a 'DESC'.
    // Si no, establece 'ASC' (ascendente) como valor por defecto
    $direccion = isset($_GET['direccion']) && $_GET['direccion'] == 'desc' ? 'DESC' : 'ASC';


    // Crea la consulta SQL con los parametros de ordenacion
    $sql = "SELECT id, name, type, subtype, region FROM pokemons ORDER BY $ordenar_por $direccion";
    $result = $conexion->query($sql);

    echo "<div class='pokemon-list'>";
    echo "<h1>Pokemones</h1>";

    if ($result->num_rows > 0) {
      echo "<table class='table table-striped pokemon-table'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>ID <a href='?ordenar_por=id&direccion=asc'>˄</a> <a href='?ordenar_por=id&direccion=desc'>˅</a></th>";
      echo "<th>Nombre <a href='?ordenar_por=name&direccion=asc'>˄</a> <a href='?ordenar_por=name&direccion=desc'>˅</a></th>";
      echo "<th>Tipo <a href='?ordenar_por=type&direccion=asc'>˄</a> <a href='?ordenar_por=type&direccion=desc'>˅</a></th>";
      echo "<th>Subtipo <a href='?ordenar_por=subtype&direccion=asc'>˄</a> <a href='?ordenar_por=subtype&direccion=desc'>˅</a></th>";
      echo "<th>Región <a href='?ordenar_por=region&direccion=asc'>˄</a> <a href='?ordenar_por=region&direccion=desc'>˅</a></th>";
      echo "<th>Acciones</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

    while ($pokemon = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . htmlspecialchars($pokemon["id"]) . "</td>";
      echo "<td>" . htmlspecialchars($pokemon["name"]) . "</td>";
      echo "<td>" . htmlspecialchars($pokemon["type"]) . "</td>";
      echo "<td>" . htmlspecialchars($pokemon["subtype"]) . "</td>";
      echo "<td>" . htmlspecialchars($pokemon["region"]) . "</td>";
      echo "<td>";
      echo "<a href='editar-pokemon.php?id=" . htmlspecialchars($pokemon["id"]) . "' class='btn btn-primary'>Editar</a> ";
      echo "<a href='borrar-pokemon.php?id=" . htmlspecialchars($pokemon["id"]) . "' class='btn btn-danger'>Borrar</a>";
      echo "</td>";
      echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

    } 
    else {
      echo "0 Pokémon encontrados";
    }

    $conexion->close();
    echo "</div>";
  ?>

  <div class="container-footer">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="d-flex flex-grow-1 justify-content-start align-items-center">
        <a href="/" class="text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <span class="text-muted">© 2024 Marcos Robador Mateos</span>
      </div>
      <ul class="nav d-flex justify-content-end list-unstyled">
      <li class="espacio-icono"><a class="text-muted" href="#"><i class="fab fa-instagram"></i></a></li>
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
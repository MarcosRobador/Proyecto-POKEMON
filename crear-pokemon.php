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
        <a class="navbar-brand" href="003pkms.php">Pokémon</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="003pkms.php">Inicio</a>
            </li>
          </ul>
        </div>
      </nav>
  </header>


  <?php
session_start();
include 'Conexion/conexion.php'; 

// Procesar el formulario cuando se envia
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $subtype = $_POST['subtype'];
    $region = $_POST['region'];

    // Prepara y ejecuta la consulta SQL
    $stmt = $conexion->prepare("INSERT INTO pokemons (name, type, subtype, region) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $type, $subtype, $region);
    $stmt->execute();

    // Redirige 
    header("Location: 003pkms.php"); 
    exit();
}
?>

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

    <div class="form-crear" >
    <h2>Crear Pokémon</h2>
    <form method="post" action="crear-pokemon.php">
        <p>
          <label for="name">Nombre:</label>
          <input type="text" name="name" id="name" required>
        </p>
        
        <p>
          <label for="type">Tipo:</label>
          <select name="type" id="type" required>
          <option value="Fire">Fire</option><option value="Water">Water</option><option value="Grass">Grass</option><option value="Electric">Electric</option><option value="Psychic">Psychic</option><option value="Normal">Normal</option><option value="Ice">Ice</option><option value="Dragon">Dragon</option><option value="Dark">Dark</option><option value="Fairy">Fairy</option><option value="Fighting">Fighting</option><option value="Flying">Flying</option><option value="Poison">Poison</option><option value="Ground">Ground</option><option value="Rock">Rock</option><option value="Bug">Bug</option><option value="Ghost">Ghost</option><option value="Steel">Steel</option>
          </select>
        </p>

        <p>
          <label for="subtype">Subtipo:</label>
          <select name="subtype" id="subtype">
          <option value="Fire">Fire</option><option value="Water">Water</option><option value="Grass">Grass</option><option value="Electric">Electric</option><option value="Psychic">Psychic</option><option value="Normal">Normal</option><option value="Ice">Ice</option><option value="Dragon">Dragon</option><option value="Dark">Dark</option><option value="Fairy">Fairy</option><option value="Fighting">Fighting</option><option value="Flying">Flying</option><option value="Poison">Poison</option><option value="Ground">Ground</option><option value="Rock">Rock</option><option value="Bug">Bug</option><option value="Ghost">Ghost</option><option value="Steel">Steel</option>
          </select>
        </p>

        <p>
          <label for="region">Región:</label>
          <select name="region" id="region" required>
          <option value="Kanto">Kanto</option><option value="Johto">Johto</option><option value="Hoenn">Hoenn</option><option value="Sinnoh">Sinnoh</option><option value="Unova">Unova</option><option value="Kalos">Kalos</option><option value="Alola">Alola</option><option value="Galar">Galar</option><option value="Hisui">Hisui</option>
          </select>
        </p>

        <input type="submit" value="Crear Pokémon">
    </form>
    </div>

</body>
</html>


  
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
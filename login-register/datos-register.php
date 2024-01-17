<?php
include '../Conexion/conexion.php'; 

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilación y saneamiento de los datos del formulario
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $email = $conexion->real_escape_string($_POST['email']);
    $password = $conexion->real_escape_string($_POST['password']);
    $apellido = $conexion->real_escape_string($_POST['apellido']);

    // Validar el formato del email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Formato de correo electrónico inválido.";
        exit;
    }

    // Comprobar si el email ya está registrado
    $stmt = $conexion->prepare("SELECT COUNT(*) FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "Este correo electrónico ya está registrado.<br>";
        echo "<button onclick=\"location.href='register.html'\">Registrar de Nuevo</button>";
        exit;
    } else {
        // El email es único, proceder con el registro
        $password_encriptada = password_hash($password, PASSWORD_DEFAULT);
        $consulta = "INSERT INTO usuarios (nombre, email, password, apellido) VALUES ('$nombre', '$email', '$password_encriptada', '$apellido')";

        // Ejecuta la consulta de inserción en la base de datos
        if (isset($consulta) && $consulta) {
            if ($conexion->query($consulta) === TRUE) {
                session_start();
                $_SESSION['nombre'] = $nombre;
                header('Location: login.html');
                exit;
            } else {
                echo "Error: " . $conexion->error;
            }
        } else {
            echo "Consulta SQL no definida o vacía.";
        }
    }

    $conexion->close();
}

?>
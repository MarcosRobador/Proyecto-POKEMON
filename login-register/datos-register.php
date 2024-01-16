<?php
include '../Conexion/conexion.php'; 


// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilación y saneamiento de los datos del formulario
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $email = $conexion->real_escape_string($_POST['email']);
    $password = $conexion->real_escape_string($_POST['password']);
    $apellido = $conexion->real_escape_string($_POST['apellido']);

    // Encripta la contraseña
    $password_encriptada = password_hash($password, PASSWORD_DEFAULT);

    // Consulta con el IBAN
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

    $conexion->close();
}
?>
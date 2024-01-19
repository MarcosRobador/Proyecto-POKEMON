<?php
session_start(); 
include '../Conexion/conexion.php'; 

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conexion->real_escape_string($_POST['email']);
    $password = $conexion->real_escape_string($_POST['password']);

    // Consulta para buscar el usuario en la base de datos
    $consulta = "SELECT id, nombre, password FROM usuarios WHERE email = '$email'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        // Usuario encontrado
        $fila = $resultado->fetch_assoc();
        if (password_verify($password, $fila['password'])) {
            // La contraseña coincide
            $_SESSION['usuario_id'] = $fila['id']; 
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['password'] = $password; // Almacenar la contraseña introducida por el usuario en la sesión
            
            // Redireccionar a 003pkms.php
            header("Location: ../index.php");
            exit();
            
        } else {
            // La contraseña no coincide
            echo "Contraseña incorrecta";
            echo "<button onclick=\"location.href='register.html'\">Registrar</button>";
            echo "<button onclick=\"location.href='login.html'\">Loguear de nuevo</button>";
        }
    } else {
        // Usuario no encontrado
        echo "No se encontró una cuenta con ese email";
        echo "<button onclick=\"location.href='register.html'\">Registrar</button>";
        echo "<button onclick=\"location.href='login.html'\">Loguear de nuevo</button>";
    }
    $conexion->close();
}
?>

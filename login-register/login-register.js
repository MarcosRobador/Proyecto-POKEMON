function validarFormulario() {
    let nombre = document.getElementById("nombre").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let apellido = document.getElementById("apellido").value;
    let mensajeError = "";
    // Para verificar que solo contiene letras
    let soloLetras = /^[a-zA-Z]+$/;
    let emailForm = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    let confirma_password = document.getElementById("confirma-password").value;

    // Validación del nombre
    if (!soloLetras.test(nombre)) {
        mensajeError += "El nombre solo debe contener letras.\n";
    } else if (nombre.length < 3) {
        mensajeError += "El nombre debe tener al menos 3 caracteres.\n";
    } else if (nombre[0] !== nombre[0].toUpperCase()) {
        mensajeError += "El nombre debe comenzar con una letra mayúscula.\n";
    }

    // Validación del apellido
    if (!soloLetras.test(apellido)) {
        mensajeError += "El apellido solo debe contener letras.\n";
    } else if (apellido.length < 3) {
        mensajeError += "El apellido debe tener al menos 3 caracteres.\n";
    } else if (apellido[0] !== apellido[0].toUpperCase()) {
        mensajeError += "El apellido debe comenzar con una letra mayúscula.\n";
    }

    // Validación del formato de email
    if (!emailForm.test(email)) {
        mensajeError += "Por favor, ingresa un correo electrónico válido.\n";
    }

    // Validación de la contraseña
    if(password.length < 6) {
        mensajeError += "La contraseña debe tener al menos 6 caracteres.\n";
    }

    // Comprobar si la contraseña contiene al menos una letra mayúscula
    if(password && !/[A-Z]/.test(password)) {
        mensajeError += "La contraseña debe contener al menos una letra mayúscula.\n";
    }

    // Validación de coincidencia de contraseñas
    if (password !== confirma_password) {
        mensajeError += "Las contraseñas no coinciden.\n";
    }

    if(mensajeError) {
        alert(mensajeError);
        return false; // Evitar que el formulario se envíe
    }

    return true; // Enviar el formulario
}

<?php
// Verificar que las contraseñas coincidan
if ($_POST['password'] === $_POST['confirm_password']) {
    echo "Ya llegó acá";
    // Actualizar la contraseña en la base de datos
    // Eliminar el token asociado a la solicitud de recuperación de contraseña
    // Redirigir al usuario a la página de inicio de sesión
} else {
    // Mostrar un mensaje de error si las contraseñas no coinciden
}
?>

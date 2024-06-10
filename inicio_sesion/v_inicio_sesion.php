<?php
require 'conexion.php';

// Recibir los datos del formulario de inicio de sesión
$correo = $_POST['c'];
$passw = $_POST['p'];

// Cifrar la contraseña utilizando MD5 (de la misma manera que se hizo al registrar el usuario)
$passw_c = md5($passw);

// Preparar la consulta SQL para buscar el usuario en la base de datos
$sql = "SELECT * FROM user WHERE correo = :correo AND contra = :con";

// Preparar la consulta
$stmt = $conn->prepare($sql);

// Vincular los parámetros
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':con', $passw_c);

// Ejecutar la consulta
$stmt->execute();

// Verificar si se encontró un usuario con el correo y la contraseña proporcionados
if ($stmt->rowCount() > 0) {
    session_start();
    // El usuario se encontró, puedes iniciar sesión
    $_SESSION['correo'] = $correo;
    header('location: ../home_user.php');
    // Cerrar la conexión
    $conn = null;
} else {
    // El usuario no se encontró o la contraseña es incorrecta
    header('location: inicio_sesion.html');
}

?>

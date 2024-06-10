<?php
require 'conexion.php';

// Recibir los datos del formulario
$name = $_POST['n'];
$ap = $_POST['ap'];
$am = $_POST['am'];
$d = $_POST['d'];
$t = $_POST['t'];
$correo = $_POST['c'];
$passw = $_POST['p'];

// Cifrar la contraseña utilizando MD5
$passw_c = md5($passw);

// Preparar la consulta SQL INSERT
$sql = "INSERT INTO user (nombre, apellido_p, apellido_m, direccion, telefono, correo, contra) VALUES (:nombre, :apellido_p, :apellido_m, :direccion, :telefono, :correo, :contra)";

// Preparar la consulta
$stmt = $conn->prepare($sql);

// Vincular los parámetros
$stmt->bindParam(':nombre', $name);
$stmt->bindParam(':apellido_p', $ap);
$stmt->bindParam(':apellido_m', $am);
$stmt->bindParam(':direccion', $d);
$stmt->bindParam(':telefono', $t);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':contra', $passw_c);

// Ejecutar la consulta
$stmt->execute();

header('location: inicio_sesion.html');

// Cerrar la conexión
$conn = null;
?>

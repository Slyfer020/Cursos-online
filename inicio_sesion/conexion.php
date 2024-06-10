<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "usuarios";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // Configurar PDO para lanzar excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Conexión fallida: " . $e->getMessage();
    }

    // Cerrar conexión (no necesario para PDO, ya que se cierra automáticamente cuando la variable sale del alcance)
    // $conn = null;
?>

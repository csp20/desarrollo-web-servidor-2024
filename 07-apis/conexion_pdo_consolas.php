<?php
    $_servidor = "localhost";
    $_usuario = "csp0017";
    $_contrasena = "Guacamayo32000";
    $_bd = "consolas_bd";

    try {
        $_conexion = new PDO("mysql:host=$_servidor;dbname=$_bd", $_usuario, $_contrasena);
        $_conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Error de conexión: " . $e -> getMessage());
    }
?>
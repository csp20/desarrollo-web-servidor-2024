<?php
    $_servidor = "127.0.0.1"; // O "localhost"
    $_usuario = "csp0017";
    $_contrasena = "Guacamayo32000";
    $_base_de_datos = "animes_bd";

    // Crear conexión
    $_conexion = new mysqli($_servidor, $_usuario, $_contrasena, $_base_de_datos);

    // Verificar la conexión
    if ($_conexion->connect_error) {
        die("Error de conexión: " . $_conexion->connect_error);
    }

    echo "Conexión exitosa a la base de datos";
?>

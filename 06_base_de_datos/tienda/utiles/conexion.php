<?php
    $_servidor = "127.0.0.1"; // O "localhost"
    $_usuario = "csp0017";
    $_contrasena = "Guacamayo32000";
    $_base_de_datos = "tienda_bd";

    
    $_conexion = new Mysqli($_servidor, $_usuario, $_contrasena, $_base_de_datos)
        or die("Error de conexión");

?>
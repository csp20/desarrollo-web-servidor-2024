<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    require('../05_funciones/ValidarForm.php');
    ?>
</head>
<body>
<!-- https://www.interior.gob.es/opencms/es/servicios-al-ciudadano/tramites-y-gestiones/dni/calculo-del-digito-de-control-del-nif-nie/ -->
<!-- ej 2 validacion form php 04 campus
 se usa funcion date

crear form con DNI nom 1 y 2 apellidos fecha nacimiento y correo y validar
dni 8 num y letra
nombre y apellidos sin caracteres y primera letra en mayus y las demas minus
si es menor hay q avisar
correo bien formado y array de 3 palabras banned (funcion str_contains)
 -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$tmp_nombre = $_POST["nombre"];
        $tmp_nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        //$tmp_apellido1 = $_POST["apellido1"];
        $tmp_apellido1 = isset($_POST["apellido1"]) ? $_POST["apellido1"] : "";
        //$tmp_apellido2 = $_POST["apellido2"];
        $tmp_apellido2 = isset($_POST["apellido2"]) ? $_POST["apellido2"] : "";
        //$tmp_DNI = $_POST["DNI"];
        $tmp_DNI = isset($_POST["DNI"]) ? $_POST["DNI"] : "";
        //$tmp_fecha = $_POST["fecha"];
        $tmp_fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
        //$tmp_correo = $_POST["correo"];
        $tmp_correo = isset($_POST["correo"]) ? $_POST["correo"] : "";

        validarnombre($tmp_nombre);
        validarapellido1($tmp_apellido1);
        validarapellido2($tmp_apellido2);
        validarDNI($tmp_DNI);
        validarCorreo($tmp_correo);
    }
    ?>


    <form action="" method="post">
        <label for="nombre"></label>
        <input type="text" name="nombre" id="nombre">

        <label for="apellido1"></label>
        <input type="text" name="apellido1" id="apellido1">

        <label for="apellido2"></label>
        <input type="text" name="apellido2" id="apellido2">

        <label for="DNI"></label>
        <input type="text" name="DNI" id="DNI">

        <label for="fecha"></label>
        <input type="text" name="fecha" id="fecha">

        <label for="correo"></label>
        <input type="text" name="correo" id="correo">

        <input type="submit" value="enviar">

    </form>
</body>
</html>
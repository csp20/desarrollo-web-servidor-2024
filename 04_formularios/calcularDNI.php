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
        $tmp_nombre = $_POST["nombre"];
        //$tmp_nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $tmp_apellido1 = $_POST["apellido1"];
        //$tmp_apellido1 = isset($_POST["apellido1"]) ? $_POST["apellido1"] : "";
        $tmp_apellido2 = $_POST["apellido2"];
        //$tmp_apellido2 = isset($_POST["apellido2"]) ? $_POST["apellido2"] : "";
        $tmp_DNI = $_POST["DNI"];
        //$tmp_DNI = isset($_POST["DNI"]) ? $_POST["DNI"] : "";
        //$tmp_fecha = $_POST["fecha"];
        //$tmp_fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
        $tmp_correo = $_POST["correo"];
        //$tmp_correo = isset($_POST["correo"]) ? $_POST["correo"] : "";

        validarnombre($tmp_nombre);
        validarapellido1($tmp_apellido1);
        validarapellido2($tmp_apellido2);
        validarDNI($tmp_DNI);
        validarCorreo($tmp_correo);
    }
    ?>


    <form action="" method="post">
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre">
        <?php if(isset($error_nombre)) echo "<span class='error'>$error_nombre</span>"?>
        <br><br>
        <label for="apellido1">apellido 1</label>
        <input type="text" name="apellido1" id="apellido1">
        <?php if(isset($error_apellido1)) echo "<span class='error'>$error_apellido1</span>"?>
        <br><br>
        <label for="apellido2">apellido 2</label>
        <input type="text" name="apellido2" id="apellido2">
        <?php if(isset($error_apellido2)) echo "<span class='error'>$error_apellido2</span>"?>
        <br><br>
        <label for="DNI">DNI</label>
        <input type="text" name="DNI" id="DNI">
        <?php if(isset($error_DNI)) echo "<span class='error'>$error_DNI</span>"?>
        <br><br>
        <!--<label for="fecha">fecha</label>
        <input type="text" name="fecha" id="fecha">
        <?php//if(isset($error_fecha)) echo "<span class='error'>$error_fecha</span>"?>
        <br><br>-->
        <label for="correo">correo</label>
        <input type="text" name="correo" id="correo">
        <?php if(isset($error_correo)) echo "<span class='error'>$error_correo</span>"?>
        <br><br>
        <input type="submit" value="enviar">

    </form>
    <?php
    if (isset($DNI) && isset($nombre) &&  isset($correo) &&  isset($apellido1) &&  isset($apellido2) ) {
       //https://github.com/Alesa95/desarrollo-web-servidor-2bdaw-2024 
       // expresion para la fecha  "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/-"
       //https://www.msn.com/es-es/motor/noticias/adi%C3%B3s-a-los-radiadores-el-invento-de-lidl-que-calienta-habitaciones-en-segundos-y-que-se-agotar%C3%A1-en-espa%C3%B1a/ar-AA1t8p1x?ocid=msedgdhp&pc=U531&cvid=36210de3e4b14e6aa1d8d1d0d6aa8fd2&ei=35
       // terminar este ej corregirlo  y comparar con el de alejandra
       ?> 
       <h1><?php echo $DNI ?> </h1>
       <h1><?php echo $correo ?> </h1>
       <h1><?php echo $nombre ?> </h1>
       <h1><?php echo $apellido1 ?> </h1>
       <h1><?php echo $apellido1 ?> </h1>
       <?php }?>

   
</body>
</html>
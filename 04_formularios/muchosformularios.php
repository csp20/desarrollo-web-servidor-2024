<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    require('../05_funciones/form_3_num.php');
    ?>
</head>
<body>
    <!--  EJERCICIO 1: Realiza un formulario que reciba 3 números y devuelva el mayor de ellos. -->
    <h1>EJERCICIO 1</h1>
    <form action="" method="post"> 
        <p>num mayor</p>
        <input type="text" name="num1">
        <br>
        <input type="text" name="num2">
        <br>
        <input type="text" name="num3">
        <br>
        <input type="submit" value="enviar">

    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        /*se hace un if separado por cada formulario*/

        if ($_POST["accion"] == "formulario_ejercicio1") {
            $num1=$_POST["num1"];
            $num2=$_POST["num2"];
            $num3=$_POST["num3"];

             numMayor($num1,$num2,$num3);
        }
    }

    ?>

    
</body>
</html>


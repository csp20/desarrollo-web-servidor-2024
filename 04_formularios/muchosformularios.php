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
    require('../05_funciones/form_abc.php');
    require('../05_funciones/iva2.php');
    require('../05_funciones/potencias2.php');
    ?>
</head>
<body>
    <!--  EJERCICIO 1: Realiza un formulario que reciba 3 números y devuelva el mayor de ellos. -->
    <h2>EJERCICIO 1</h2>
    <form action="" method="post"> 
        <p>num mayor</p>
        <input type="text" name="num1">
        <br>
        <input type="text" name="num2">
        <br>
        <input type="text" name="num3">
        <br>
        <input type="hidden" name="accion" value="formulario_ejercicio1"> <br>
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
    <!-- EJERCICIO 2 -->
    <h2>EJERCICIO 2 abc</h2>
    <form action="" method="post"> 
        <label>multiplos de c</label>
        <input type="text" name="num1">
        <br>
        <input type="text" name="num2">
        <br>
        <input type="text" name="num3">
        <br>
        <input type="hidden" name="accion" value="formulario_ejercicio2"> <br>
        <input type="submit" value="enviar">
        
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        /*se hace un if separado por cada formulario*/

        if ($_POST["accion"] == "formulario_ejercicio2") {
            $num1=$_POST["num1"];
            $num2=$_POST["num2"];
            $num3=$_POST["num3"];

             numABC($num1,$num2,$num3);
        }
    }
    ?>
    <!-- EJERCICIO IVA -->
    <h2>EJERCICIO iva</h2>
    <form action="" method="post">
        <label for="precio">precio</label>
        <input type="text" name="precio" id="precio">
        <br><br>
        <select name="iva">
            <option value="general">general</option>
            <option value="reducido">reducido</option>
            <option value="superreducido">superreducido</option>
        </select>
        <br><br>
        <input type="hidden" name="accion" value="formulario_iva"> <br>
        <input type="submit" value="Calcular">
     </form>
     <?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if ($_POST["accion"] == "formulario_iva") {
            $precio = $_POST["precio"];
            $iva = $_POST["iva"];

             iva($precio, $iva);
        }
        
    }
    
    ?>
    <!-- ej potencias -->
    <h2>EJERCICIO potencias</h2>
    <form action="" method="post">
        <p>base</p>
        <input type="text" name="base">
        <br>
        <p>potencia</p>
        <input type="text" name="potencia">
        <input type="hidden" name="accion" value="formulario_potencias"> <br>
        <input type="submit" value="enviar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if ($_POST["accion"] == "formulario_potencias") {
            
            $tmp_base =$_POST["base"];
            $tmp_potencia =$_POST["potencia"];
            
            if ($tmp_base != '') {
                if (filter_var($tmp_base,FILTER_VALIDATE_INT) !== FALSE) {
                    $base = $tmp_base;
                }else {
                    echo "<p> la base debe ser un num</p>";
                }
            }else {
                echo "<p> la base es obligatoria</p>";
            }

            if ($tmp_potencia != '') {
                if (filter_var($tmp_potencia,FILTER_VALIDATE_INT) !== FALSE) {
                    if ($tmp_potencia>=0) {
                        $potencia = $tmp_potencia;
                    }else {
                        echo "<p> la potencia debe ser mayor o igual que cero</p>";
                    }
                }else {
                    echo "<p> la potencia debe ser un num</p>";
                }
            }else {
                echo "<p> la ppotencia es obligatoria</p>";
            }

            if (isset($base)&& isset($potencia)) {
                $res =  superpotencia($potencia, $base);
                echo "<p> la potencia es $res</p>";
            }
           
        }
        
    }
    ?>
</body>
</html>


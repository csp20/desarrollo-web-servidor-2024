<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    ?>
</head>
<body>
    <!--  EJERCICIO 1: Realiza un formulario que reciba 3 números y devuelva el mayor de ellos. -->
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
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $num1=$_POST["num1"];
        $num2=$_POST["num2"];
        $num3=$_POST["num3"];

        $mayor= $num1;
        if ($num2>$num1 && $num2>$num3) {
           $mayor=$num2;
           echo "<h3>$mayor</h3>";
        }else if($num3>$num1 && $num3>$num2){
            $mayor=$num3;
           echo "<h3>$mayor</h3>";
        }else {
            $mayor=$num1;
           echo "<h3>$mayor</h3>";
        }
        
    }
    ?>
</body>
</html>
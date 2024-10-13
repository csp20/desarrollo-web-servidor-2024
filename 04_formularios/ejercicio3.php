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
    <!--EJERCICIO 3: Realiza un formulario que reciba dos números 
    y devuelva todos los números primos dentro de ese rango (incluidos los extremos)-->

    <form action="" method="post"> 
        <p>num primos</p>
        <input type="text" name="num1">
        <br><br>
        <input type="text" name="num2">
        <br><br>
        
        <input type="submit" value="enviar">
        

    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];      
    }
    
    ?>
        <select name="iva">
        <?php
         $num=$num1;
            for ($i=$num1; $i <=$num2 ; $i++) {
               
                if (($num % $i == 0) && ($num % 2 != 0) && ($num % 3 != 0)  ) { 
                    echo "<option >$num</option>";
                }
                $num++;
            }
            ?>
        
        </select> 
    
</body>
</html>
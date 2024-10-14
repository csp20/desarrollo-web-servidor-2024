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
    <!-- EJERCICIO 2: Realiza un formulario que reciba 3 números: a, b y c.
      Se mostrarán en una lista los múltiplos de c que se encuentren entre a y b.

        Por ejemplo, si a = 3, b = 10, c = 2

        Los múltiplos de 2 entre 3 y 10 son: 4, 6, 8 y 10-->
    <form action="" method="post"> 
        <label>multiplos de c</label>
        <input type="text" name="num1">
        <br>
        <input type="text" name="num2">
        <br>
        <input type="text" name="num3">
        <br>
        <input type="submit" value="enviar">
        

    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $num3 = $_POST["num3"];
            
    }
    
    ?>
        <select name="iva">
        <?php
            for ($i=$num1; $i <$num2 ; $i++) { 
                if ($i % $num3 == 0) { // Verificar si i es múltiplo de c
                    echo "<option >$i</option>";
                }
            }
            ?>
        
        </select> 
    

</body>
</html>
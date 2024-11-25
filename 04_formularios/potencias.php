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
    <?php

    //crear un formulario que reciba 2 parametros base y exponente
    //ejemplo 2 elevado a 3 = 8 --> 2x2x2 =8
    //cuando se envie el form se calcula el res
    ?>
    <form action="" method="post">
        <p>base</p>
        <input type="text" name="base">
        <br>
        <p>potencia</p>
        <input type="text" name="potencia">
        <input type="submit" value="enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // CODIGO Q  SE EJEVUTA CUANDO EL SERVER  recibe un post
    
    $potencia =$_POST["potencia"];
    $base =$_POST["base"];
    $res = 1;
    for ($i=0; $i <$potencia ; $i++) { 
        $res = $res * $base;
        
    }
    if ($potencia ==0) $res == 1;
    echo "<h1>$res</h1>";
    }


    ?>
</body>
</html>
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
    <form action="" method="post">
        <p>mensaje</p>
        <input type="text" name="mensaje">
        <br>
        <!-- aqui otro input-->
        <p>num</p>
        <input type="text" name="num">
        <input type="submit" value="enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // CODIGO Q  SE EJEVUTA CUANDO EL SERVER  recibe un post
    
    $num =$_POST["num"];
    $mensaje =$_POST["mensaje"];
    
    for ($i=0; $i <$num ; $i++) { 
        
        echo "<h1>$mensaje</h1>";
    }
    
    }
    
    
    

    //añadir al formulario un campo de texto pa meter un num
    //mostrar el mensaje tantas veces como indique el num
    ?>
</body>
</html>
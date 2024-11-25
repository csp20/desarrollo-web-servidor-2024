<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- crear un formulario que reciba nom y edad 
    si la edad es menor que 18 se muestra el nomnbre 
    si la edad etsa entre 18-65 nombre y mayor edad 
    si la edad es mas 65 nombre y jubliaoo
-->
<form action="" method="post">
        <p>nombre</p>
        <input type="text" name="nombre">
        <br>
        <p>edad</p>
        <input type="text" name="edad">
        <input type="submit" value="enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // CODIGO Q  SE EJEVUTA CUANDO EL SERVER  recibe un post
    
    $edad =$_POST["edad"];
    $nombre =$_POST["nombre"];

    if ($edad<18) echo "<h2>el nombre es $nombre</h2>";
    elseif ($edad>18 && $edad<65) echo "<h2>el nombre es $nombre y la edad es $edad</h2>";
    else echo "<h2>el nombre es $nombre y ta jubilao </h2>";

    }
    ?>

</body>
</html>
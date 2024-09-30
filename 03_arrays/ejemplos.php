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
    /*todos los arrays son asociativos
    - tiene clave valor
    
    */
    $numeros = [5,10,9,6,7,4];
    $numeros = array(6,10,9,4,3);
    print_r($numeros); #print relational

    echo "<br></br>";

    //$animales = ["lince","gato", "perro", "leon"];
    $animales = [
        "a1" => "lince",
        "a2" => "gato",
        "a3" => "perro",
        "a4" => "leon",
    ];
    //print_r($animales);
    echo "<p>". $animales["a3"] . "</p>";



    ?>
</body>
</html>
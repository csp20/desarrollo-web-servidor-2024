<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 2</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    ?>
</head>
<body>
    <?php
    //2 
    $arrayVacio = [];
    $array1 = [];
    $array2 = [];

    for ($i=0; $i < 5; $i++) { 
       $array1[$i]= rand(1,10);
       $array2[$i]= rand(10,100);
    }

    $arrayVacio[0]= $array1;
    $arrayVacio[1]= $array2;

    //print_r($arrayVacio);

    //2.1
    
    for ($i=0; $i <count($array1); $i++) { 
        echo($array1[$i].", ");
        
    }
    echo"<br>";
    for ($i=0; $i <count($array2); $i++) { 
        echo($array2[$i].", ");
    
    }
    
    //2.2
    $max =0;
    $min = 200;
    $suma =0;
    for ($i=0; $i <count($array1); $i++) { 
       if ($array1[$i]>$max) {
        $max= $array1[$i];
       }
       if ($array1[$i]<$min) {
        $min= $array1[$i];
       }
       $suma += $array1[$i];
        
    }
    echo"<br>";
    echo("del primer array");
    echo"<br>";
    $media = $suma/count($array1);
    echo("la media es ".$media);
    echo"<br>";
    echo("el mayor num es ".$max);
    echo"<br>";
    echo("el menor num es ".$min);
    echo"<br>";
    
    
    $max =0;
    $min = 200;
    $suma =0;
    for ($i=0; $i <count($array2); $i++) { 
       if ($array2[$i]>$max) {
        $max= $array2[$i];
       }
       if ($array2[$i]<$min) {
        $min= $array2[$i];
       }
       $suma += $array2[$i];
        
    }
    echo"<br>";
    echo("del segundo array");
    echo"<br>";
    $media = $suma/count($array2);
    echo("la media es ".$media);
    echo"<br>";
    echo("el mayor num es ".$max);
    echo"<br>";
    echo("el menor num es ".$min);
    echo"<br>";
    ?>
</body>
</html>
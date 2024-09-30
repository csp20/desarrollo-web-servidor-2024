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
    "<h1> lista con while</h1>";
    $i =1;
    echo "<ul>";
    while ($i <=10){
        echo $i;
        $i++;
    }
    echo "</ul>";
    ?>

<?php
    "<h1> lista con while alternativa </h1>";
    $i =1;
    echo "<ul>";
    while ($i <=10):
        echo $i;
        $i++;
    endwhile;
    echo "</ul>";
    ?>
    <!--EJERCICIO 2 mostrar los num multiplos de 3 usando while e if-->
    <!--ejercicio 3 CALCULAR LA SUMA DE LOS NUM PARES ENTRE 1 Y 20 -->
    <!--EJERCICIO 4 calcular el factorial de 6 -->


    ?>
    <h1> listas FOR</h1>
    <?php
        echo "<ul>";
        for ($i=0; $i <=10 ; $i++) { 
            echo $i;
        }
        echo "</ul>";

    ?>
    <h1> listas FOR ALTERNATIVA</h1>
    <?php
        echo "<ul>";
        for ($i=0; $i <=10 ; $i++):
            echo $i;
        endfor;
        echo "</ul>";

    ?>
    <h1> listas FOR BRAKE cursed </h1>
    <?php
        echo "<ul>";
        for ($i=0; ; $i++):
            if($i>10){
                break;
            }
            echo "<li> $i </li>";
        endfor;
        echo "</ul>";


    ?>
    <?php
        echo "<ul>";
        $i=0;
        for ( ; ; ):
            if($i>10){
                break;
            }
            echo "<li> $i </li>";
            $i++;
        endfor;
        echo "</ul>";

    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicios</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    ?>
</head>
<body>
    <!-- EJERCICIO 1 calcular la suma d todos los numeros pares del 1 al 20 -->
    <?php

    


    ?>
    <!-- EJERCICIO 2 mostrar la fecha actual con el formato  viernes 27 de septiembre de 2024 -->
    <?php

    $diaHoy = date("l");
    $diaHoy = match($diaHoy) {
    "Monday" => "lunes",
    "Tuesday"=> "martes",
    "Wednesday"=> "miercoles",
    "Thursday" => "jueves",
    "Friday" => "viernes",
    "Saturday"=> "sabado",
    "Sunday"=> "domingo"
    };

    $mes = date("n");
    $mes = match ($mes) {
       "1"  => "enero",
       "2"  => "febrero",
       "3" => "marzo",
       "4" => "abril",
       "5"  => "mayo",
       "6"  => "junio",
       "7" => "julio",
       "8" => "agosto",
       "9"  => "septiembre",
       "10"  => "octubre",
       "11" => "nov",
       "12" => "dec"
    };
    $dia_n = date("j");
    $anno = date("Y");
    

    echo "$diaHoy $dia_n $mes   $anno";
    ?>
        <!--EJERCICIO 2 mostrar los num multiplos de 3 usando while e if-->
    <?php  /*
        $i = 1;
        $num =3;
        while($i>0):
            $num = $i *3;
            $i ++;
            echo "<h3> $num  </h3> ";
            if ($num>=36) {
                $i =0;
            }
        endwhile;*/

    ?>



    <!--ejercicio 3 CALCULAR LA SUMA DE LOS NUM PARES ENTRE 1 Y 20--> 
    <?php  /*
        $num =0;
        for($i=1; $i<=20; $i++):    
            $i++;
            $num = $num + $i;
        endfor;
        echo $num;*/
    ?>
    <!--EJERCICIO 4 calcular el factorial de 6 -->
    <br>
    <br>
    <?php
        $num = 1;
        for($i=1; $i<=6; $i++):    
            $num = $i * $num;
           // echo "<h3> $num  </h3> ";
        endfor;
        echo "<h3> $num  </h3> ";

    ?>


</body>
</html>
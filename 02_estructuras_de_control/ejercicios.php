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
    <h3>EJERCICIO 2 </h3>
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
        endwhile;


        otra forma de hacerlo

         $i = 1;
         while($i<=100):
            if($i %3 ==0);
            echo "<ul> $num  </ul> ";
         endif;
         $i++;
        endwhile;
*/
    ?>

<h3>EJERCICIO 3 </h3>

    <!--ejercicio 3 CALCULAR LA SUMA DE LOS NUM PARES ENTRE 1 Y 20--> 
    <?php  /*
        $num =0;
        for($i=1; $i<=20; $i++):    
            $i++;
            $num = $num + $i;
        endfor;
        echo $num;


        OTRA FORMA DE HACERLO

        $=i;
        $suma=0;
        while($i<=20){
            if($i %2 ==0){
            $suma +=$i;
            }
            $i++;

        }
            echo "<p>la suma es $suma </p>"
        */
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

        /*
        otra forma de hacerlo
        
        $factorial = 6;
        $resultado = 1;
        $i =1;
        while($i <= $factorial){
            $resultado *= $i;

            $i++;

        }
            <!--EJERCICIO 5 muestra los 50 primeros num primos -->
            q solo sean divisibles por 1 o si mismo ej: 5 7 13 etc 
            usando un bucle de 2 a n-1
          */
    ?>
    <?php
         $numero =2;
         $numeroprimos= 0;
         echo "<ol>";
    while ($numeroprimos<50) {
        $primo= true;
        for ($j=2; $j<$numero; $j++) { 
               if ($numero % j==0) {
                $primo= false;
                break;
            }
        }
        if($esprimo)$numeroprimos++; echo "<li> $numero </li>";
        $numero++;
           
    }
       echo "</ol>";
    ?>

    
          

        


</body>
</html>
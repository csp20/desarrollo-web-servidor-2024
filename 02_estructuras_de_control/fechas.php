<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fechas</title>
</head>
<body>
    <?php 
    $numero = "2";
    $numero = (int) $numero;
    if($numero ===2) echo "exito";
    else echo "no exito";

    /* 
    "2" == 2    "2" es igual a 2
    "2" !== 2    "2" no es identico a 2
    2 ===2       2 si es identico a 2 
    2 !== 2.0    2 no es identico a 2.0
    
    */

    $hora = (int) date("G"); // te dice la hora  y se castea a int 
    //var_dump($hora);

    /* 
        SI $hora entre 6 y 11 es mañana
        SI $hora entre 12 y 14 es mediodia
        SI $hora entre 15 y 20 es tarde
        SI $hora entre 20 y 0 es noche
        SI $hora entre 1 y 5 es madrugada
    
    

        $hora_exacta = date ("H: i:s:u");
        echo "<h1> $hora_exacta </h1>"

    if($hora>6 and &hora<11)
    */

    //$dia = date ("l");
    $dia = "Tuesday";
    //echo "<h2> hoy es $dia </h2>";

    // tenemos clase lunes miercoles y viernes 

    switch ($dia) {
        case "Monday";
        case "Wednesday" :    
        case "Friday":
            echo "<h2> hoy hay clase</h2>";
            break;
        
        default:
        echo "<h2> hoy  NO tenemos clase</h2>";
           
    }
    ?>

   

</body>
</html>
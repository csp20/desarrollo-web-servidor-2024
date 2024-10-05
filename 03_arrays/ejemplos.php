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
    <link href="estilos.css" rel="stylesheet" type="text/css">
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

    //añadir animales especificando claves
    $animales["a3"]= "koala";
    $animales["a5"]= "canguro";

    //añadir animales sin clave
    array_push($animales, "morsa");
    $animales[]= "tiburon";

    //borrar animales epecificando claves
    unset($animales["a2"]);

    //eliminar clave y poner orden numerico 
    $animales = array_values($animales);

    // contar cantidad
    $cantidad_animales = count($animales);
    echo "<h3> hay ". $cantidad_animales . " animales </h3>";
    //print_r($animales);

    echo"<ol>";
    for($i= 0; $i < count($animales); $i++){
        echo "<li>". $animales[$i] . "</li>";
    }
    echo "</ol>";
    echo"<ol>";
    $k=0;
    while ($k<=count($animales)) {
        echo "<li>". $animales[$i] . "</li>";
        $k++;
    }
    echo "</ol>";

    
    /*
        4321 TDZ =>"audi"
        9926 LMS =>"mercedes" 

        CREAR EL ARRAY CON 3 COCHES +

        AÑADIR 2 COCHES CON MATRICULA +

        AÑADIR UNO CIN MATRICULA +

        BORAR EL COCHES IN MATRTICULA +

        RESETEAR LAS CLAVES Y ALMACENARLAS EM OTRO ARRAY +
    */
    $coches = [
        "4321 TDZ" =>"AUDI",
        "9926 LMS" =>"MERCEDES",
        "5658 CSL" =>"BMW",
    ];

    $coches["3290 ARS"]= "SEAT";
    $coches["4427 THD"]= "VOLKSWAGEN";


    $coches[""]= "FIAT";

    unset($coches[""]);

    $coches_ordenados = array_values($coches);

    //echo "<p> hay ". $coches_ordenados . " coches ordenados </p>";
    //echo "<p> hay ". $coches . " coches con matricula </p>";
    print_r($coches);
    echo "<p></p> ";
    print_r($coches_ordenados);

    // lista coche foreach
    echo"<ol>";
    foreach($coches as $coche){
        echo "<li>$coche</li>";
    }
    echo"</ol>";

    // lista coche foreach con clave
    echo"<ol>";
    foreach($coches as $matricula => $coche){
        echo "<li>$matricula, $coche</li>";
    }
    echo"</ol>";



    ?>
    <!-- tablas con foreach -->
    <table>
        <caption>Coches</caption>
        <thead>
            <tr>
                <th>matricula</th>
                <th>coches</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //tabla con foreach facil
            foreach($coches as $matricula => $coche){
                echo"<tr>";
                echo "<td>$matricula</td>";
                echo "<td>$coche</td>";
                echo"</tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <br>


    <table>
        <caption>Animales</caption>
        <thead>
            <tr>
                <th>num</th>
                <th>tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //tabla con foreach para base de datos
            foreach($animales as $num => $tipo){ ?>
               <tr>
                    <td><?php echo $num ?></td>
                    <td><?php echo $tipo ?></td>
               </tr>
            <?php }?>
        </tbody>
    </table>

    <!-- -->
</body>
</html>
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
    <link href="coloresNotas.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
    /* EJERCICIO 1
     DESARROLLO WEB SERVIDOR => ALEANDRA
     DESARROLLO WEB CLIENTE => JOSE
     INTERFACES => JOSE
     DESPLIGUES => JAIME
     EMPRESA => ANDREA
     INGLES => VIRGINIA

     MOSTRAR TODO EN UNA TABLA 



     EJERCICIO 2 

     SERGIO => 4
     JUANJO => 5
     VIEIRA => 10
     ISMA => 6
     PAULA => 9
     MOSTRAR TABLA CON 3 COLUMNAS

     COLUMNA 1 ALUMNO
     COLUMNA 2 NOTA
     COLUMNA 3 APROBAO SUSPENSO


     AÑADIR COLOR ROJO AL SUSPENSO 

     EJERCICIO 1
    */
    $profesores = [
        "servidor" => "aleandra",
        "cliente" => "jose",
        "interfaces" => "jose",
        "despliegues" => "jaime",
        "empresa" => "andrea",
        "ingles" => "virginia",
    ];
    ?>
    <table>
        <caption>$profesores</caption>
        <thead>
            <tr>
                <th>asignatura</th>
                <th>profesor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //tabla con foreach facil
            foreach($profesores as $asignatura => $profesor){
                echo"<tr>";
                echo "<td>$asignatura</td>";
                echo "<td>$profesor</td>";
                echo"</tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <?php
    //EJERCICIO 2 
    $notas = [
        "sergio" => 3,
        "juanjo" => 5,
        "vieira" => 10,
        "isma" => 4,
        "paula" => 6,  
    ];
     ?>
     <table>
        <caption>$notas</caption>
        <thead>
            <tr>
                <th>alumno</th>
                <th>notas</th>
                <th>calificacion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //tabla con foreach facil
            foreach($notas as $alumno => $nota){
                echo"<tr>";
                echo "<td>$alumno</td>";
                echo "<td>$nota</td>";
                if ($nota<5)echo '<td class="colores"> suspenso </td>';
                elseif($nota >=5 AND ($nota<7))echo '<td> bien </td>';
                elseif($nota >=7 AND ($nota<9))echo "<td> notable </td>";
                elseif($nota >=9 )echo "<td> sobresaliente </td>";
                else echo "<td> error </td>";
                echo"</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
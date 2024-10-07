<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MATRICES</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    ?>
    <link href="coloresNotas.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    $array = [1,2,3,4];
        $videojuegos = [
            ["disco elysium", "rpg", 24.99],
            ["Dragon ball z kakarot","accion", 59.99],
            ["persona 3", "rpg", 24.99],
            ["commando 2", "estrategia", 4.99],
            ["Hollow knight", "metroidvania", 9.99],
            ["stardew valley", "gestion de recursos", 7.99],
        ];

        //añadir juego
        $nuevo_videojuego = ["octopath traveler", "rpg", 24.99];
        array_push($videojuegos,$nuevo_videojuego);
        array_push($videojuegos,["elden ring", "metroidvania", 9.95]);

        //borrar juego
        unset($videojuegos[3]);

        //ordenar array
        $videojuegos = array_values($videojuegos);

        array_push($videojuegos, ["dota 2","moba", 0]);
        array_push($videojuegos, ["fall guys","plataforma", 0]);
        array_push($videojuegos, ["rocket league","coches", 0]);
        array_push($videojuegos, ["fornite","accion", 0]);

        for ($i=0; $i <count($videojuegos) ; $i++) { 
            if ($videojuegos[$i][2]==0) {
                $videojuegos[$i][3] = "gratis";
            }else{
                $videojuegos[$i][3] = "de pago";
            }
          
        }
        //variable auxiliares que si quiero reordenar tengo que volver a escribirlas y machacarlas
        $_titulo = array_column($videojuegos, 0);
        $_categoria = array_column($videojuegos, 1);
        $_precio = array_column($videojuegos, 2);

        //array_multisort($_titulo, SORT_DESC); descendente
        //array_multisort($_categoria, SORT_ASC, $videojuegos);
        array_multisort($_categoria, SORT_ASC,
                        $_precio, SORT_DESC,
                        $_titulo,SORT_DESC,
                        $videojuegos);

    ?>
    <table border="1px">
        <thead>
            <tr>
                <th>videojuego</th>
                <th>categoria</th>
                <th>precio</th>
                <th>pago</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($videojuegos as $videojuego){
                //print_r($videojuego);
                //echo $videojuego[0];
               // echo "<br><br>";
               list($titulo,$categoria,$precio,$pago) = $videojuego; //descompone array en variables 
               // list solo funciona con matrices n*n
               echo "<tr>";
               echo "<td>$titulo</td>";
               echo "<td>$categoria</td>";
               echo "<td>$precio</td>";
               echo "<td>$pago</td>";
               echo "</tr>";

            }
            ?>
        </tbody>
    </table>
</body>
</html>
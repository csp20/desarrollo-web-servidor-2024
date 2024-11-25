<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 1</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    ?>
</head>
<body>
    <?php
        //1
        $animes = [
            ["boku no hiro ", "accion"],
            ["Dragon ball z ","accion"],
            ["assesination classroom", "misterio"],
            ["naruto", "accion"],
            ["evangelion", "filosofia"],
            
        ];
        //1.1
        $nuevo_anime = [" doraemon", "comedia"];
        array_push($animes,$nuevo_anime);
        array_push($animes,[" sargento keroro", "comedia"]);

        //1.2
        unset($animes[0]);
         $animes = array_values($animes);

        //1.3
        for ($i=0; $i <count($animes) ; $i++) { 
            $animes[$i][2] = rand(1990,2030);
            //$animes[$i][3]
        }
        //1.4
        for ($i=0; $i <count($animes) ; $i++) { 
            $animes[$i][3] = rand(1,99);
          
        }
        //1.5
        for ($i=0; $i <count($animes) ; $i++) { 
            if ($animes[$i][2] <= 2024) {
                $animes[$i][4] = "ya disponible";
            }else{
                $animes[$i][4] = "proximamente";
            }
          
        }
        //1.6
       

        $_titulo = array_column($animes, 0);
        $_genero = array_column($animes, 1);
        $_anio = array_column($animes, 2);
        $_episodios = array_column($animes, 3);
        $_estreno = array_column($animes, 4);
        array_multisort($_genero, SORT_ASC,
                        $_anio, SORT_ASC,
                        $_titulo,SORT_ASC,
                        $_episodios,
                        $_estreno,
                        $animes);

        //1.7

    ?>
    <table border="1px">
        <thead>
            <label>animes</label>
            <tr>
                <th>titulo</th>
                <th>genero</th>
                <th>anio</th>
                <th>capitulos</th>
                <th>estreno</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($animes as $anime){
                //print_r($videojuego);
                //echo $videojuego[0];
               // echo "<br><br>";
               list($titulo,$genero,$anio,$capitulo,$estreno) = $anime; //descompone array en variables 
               // list solo funciona con matrices n*n
               echo "<tr>";
               echo "<td>$titulo</td>";
               echo "<td>$genero</td>";
               echo "<td>$anio</td>";
               echo "<td>$capitulo</td>";
               echo "<td>$estreno</td>";
               echo "</tr>";

            }
            ?>
        </tbody>
    </table>
</body>
</html>
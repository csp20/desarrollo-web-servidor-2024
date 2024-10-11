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
    <!-- Crea un array multidimensional que contenga la siguiente
    información de series: título, plataforma y temporadas.
    Crea al menos 5 series con sus respectivos títulos,
    plataforma y temporadas.
    Muéstralos en tres tablas. Una los mostrará tal y como los
    has añadido, otra ordenados por temporada (de menor a mayor)
    y otra ordenados por la plataforma a la que pertecenen, y si
    la plataforma es igual, por el título.
    -->
    <?php
        $series =[
            ["peaky blinders", "netflix", 6],
            ["breaking bad", "netflix", 6],
            ["game of thrones", "hbo", 8],
            ["the boys", "amazon prime", 4],
            ["chernobyl", "hbo", 1],
        ];
    ?>
    <table border="1px">
        <caption>series</caption>
        <thead>
            <tr>
                <th>titulo</th>
                <th>plataforma</th>
                <th>temporada</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($series as $serie){

                list($titulo,$plataforma,$temporada)= $serie;
                echo "<tr>";
                echo "<td>$titulo </td>";
                echo "<td>$plataforma</td>";
                echo "<td>$temporada</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
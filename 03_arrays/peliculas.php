<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>peliculas</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    ?>
    <link href="coloresNotas.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    $peliculas = [
        ["karate a muerte en torremolinos", "accion", 1975],
        ["sharkado", "accion", 2015],
        ["princes por sorpresa 2", "comedia", 2008],
        ["temblores 4", "terror", 2018],
        ["los increibles", "aventuras", 2005],
        ["chicken little", "accion", 2000],
    ];
    
    ?>
    <h2> peliculas</h2>
    <table border="1px">
        <thead>
            <tr>
                <th>tiulo</th>
                <th>genero</th>
                <th>año</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($peliculas as $pelicula){
                list($titulo,$genero,$año)= $pelicula;
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$genero</td>";
                echo "<td>$año</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
        <!--forma 2 de tabla -->
        <table border="1px">
        <thead>
            <tr>
                <th>tiulo</th>
                <th>genero</th>
                <th>año</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($peliculas as $pelicula){
                list($titulo,$genero,$año)= $pelicula; ?>
               <tr>
                <td><?php echo $titulo ?></td>
                <td><?php echo $genero ?></td>
                <td><?php echo $año ?></td>
               </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <?php 
    /**
     * A). AÑADIR CON UN RAND LA DURACION DE LA PELICULA COMO COLUMNA ENTRE 30 Y 300
     * 
     * 
     * B). AÑADIR COMO UNA NUEVA COLUMNA, EL TIPO DE PELICULA EL TIPO SERA
     * CORTOMETRAJE MENOS 60
     * LARGO MAYAR IGUAL 60
     * 
     * C). MOSTRAR OTRA TABLA TODAS LAS COLUMNAS Y ORDENAR EN ESTE ORDEN
     *  1. GENERO
     *  2. AÑO
     *  3.TITULO ALFABETICO Y AÑO RECIENTE A ANTIGUO
     * 
     * 
     */
        for ($i=0; $i <count($peliculas); $i++) { 
            $peliculas[$i][3] = rand(30,300);
            if ($peliculas[$i][3] < 60) {
                $peliculas[$i][4]="cortometraje";
            }else{
                $peliculas[$i][4]="largometraje";
            }
        }



        
//SEGUIR POR AQUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII





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
                <th>titulo</th>
                <th>genero</th>
                <th>año</th>
                <th>duracion</th>
                <th>tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($peliculas as $pelicula){
                list($titulo,$genero,$año,$duracion,$tipo)= $pelicula; ?>
               <tr>
                <td><?php echo $titulo ?></td>
                <td><?php echo $genero ?></td>
                <td><?php echo $año ?></td>
                <td><?php echo $duracion ?></td>
                <td><?php echo $tipo ?></td>
               </tr>
            <?php }
            ?>
        </tbody>
    </table>
</body>
</html>
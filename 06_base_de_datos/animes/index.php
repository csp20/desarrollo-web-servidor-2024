<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);

    require('conexion.php');
    ?>
</head>
<body>
    <div class ="container">
    <h1>tabla de animes</h1>
    <?php
        $sql = "SELECT * FROM animes";
        $resultado = $_conexion -> query($sql);
        /**
         * aplicamos la funcion query a la conexion donde se ejecuta la sentencia sql hecha
         * 
         * el resultado se almacena resultado, que es un objeto con una estrcutita 
         * parecida a los arrays
         * 
         */
    
        
    ?>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>titulo</th>
                <th>estudio</th>
                <th>anio</th>
                <th>num temporada</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($fila = $resultado -> fetch_assoc()){  // TRATA EL RESLTUDAO COMO UN ARRRAY ASOCITIVO
                    echo "<tr>";
                    echo "<td>". $fila["titulo"].   "</td>";
                    echo "<td>". $fila["nombre_estudio"].   "</td>";
                    echo "<td>". $fila["anno_estreno"].   "</td>";
                    echo "<td>". $fila["num_temporadas"].   "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
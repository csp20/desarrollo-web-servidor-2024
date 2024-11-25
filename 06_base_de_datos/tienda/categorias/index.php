<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index categorias tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);

    require('../utiles/conexion.php');
    /*session_start();
    if (isset($_SESSION["usuario"])) {
        echo "<h2>Bienvenid@ " . $_SESSION["usuario"]. "</h2>";
     }else{
        header("location: usuario/iniciar_sesion.php");
        exit;
     }*/
    ?>
</head>
<body>
    <div class ="container">
        <a class="btn btn-warning" href="usuario/cerrar_sesion.php"> cerrar sesion</a>
    <h1>tabla de categorias</h1>
    <?php
        $sql = "SELECT * FROM categorias";
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
                <th>categorias</th>
                <th>descripcion</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($fila = $resultado -> fetch_assoc()){  // TRATA EL RESLTUDAO COMO UN ARRRAY ASOCITIVO
                    echo "<tr>";
                    echo "<td>". $fila["categorias"].   "</td>";
                    echo "<td>". $fila["descripcion"].   "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
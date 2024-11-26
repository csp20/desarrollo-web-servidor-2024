<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index categorias tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

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
    <div class="container">
        <!--<a class="btn btn-warning" href="usuario/cerrar_sesion.php">cerrar sesion</a>-->
        
        <h1>tabla de categorias</h1>
        <a class="btn btn-secondary" href="nueva_categoria.php">crear categoria</a>
        <br><br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fila"])) {
            $fila = $_POST["fila"];
            $sql = "DELETE FROM categorias WHERE categoria = '$fila'";
            $_conexion->query($sql);
            
        }

        $sql = "SELECT * FROM categorias";
        $resultado = $_conexion->query($sql);
        ?>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>categoria</th>
                    <th>descripcion</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $resultado->fetch_assoc()) {  // TRATA EL RESULTADO COMO UN ARRAY ASOCIATIVO
                    echo "<tr>";
                    echo "<td>" . $fila["categoria"] . "</td>";
                    echo "<td>" . $fila["descripcion"] . "</td>";
                    echo "<td></td>";
                    echo '<td><a class="btn btn-secondary" href="editar_categoria.php?categoria=' .$fila["categoria"] . '">editar categoria</a></td>';
                    echo '<td>
                            <form action="" method="post">
                                <input type="hidden" name="fila" value="' . $fila["categoria"] . '">
                                <input class="btn btn-primary" type="submit" value="borrar categoria">
                            </form>
                          </td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


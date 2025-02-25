<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index PRODUCTO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require('../utiles/conexion.php');
    session_start();
    
    ?>
</head>
<body>
    <div class="container">
        <!--<a class="btn btn-warning" href="usuario/cerrar_sesion.php">cerrar sesion</a>-->
        
        <h1>tabla de productos</h1>
        <a class="btn btn-primary" href="nuevo_producto.php">crear producto</a>
        <div class="mb-3">
            <br>
                <a class="btn btn-secondary" href="../index.php">Volver</a>
            </div>
        <br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fila"])) {
            $fila = $_POST["fila"];
            /*$sql = "DELETE FROM producto WHERE id_producto = '$fila'";
            $_conexion->query($sql);*/
            //1 prepare
            $sql = $_conexion-> prepare("DELETE FROM producto WHERE id_producto = '$fila'");
            //2 bind
            $sql ->bind_param("i",$fila);
            //3 
            $sql -> execute();

        }

        $sql = "SELECT * FROM producto";
        $resultado = $_conexion->query($sql);

        $conexion -> close();
        ?>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>precio</th>
                    <th>categoria</th>
                    <th>stock</th>
                    <th>imagen</th>
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
                    echo "<td>" . $fila["id_producto"] . "</td>";
                    echo "<td>" . $fila["nombre"] . "</td>";
                    echo "<td>" . $fila["precio"] . "</td>";
                    echo "<td>" . $fila["categoria"] . "</td>";
                    echo "<td>" . $fila["stock"] . "</td>";
                    ?>
                    <td>
                        <img width='90' height='100' src="../imagenes/<?php echo $fila["imagen"]; ?>" >
                    </td>
                    <?php
                    echo "<td>" . $fila["descripcion"] . "</td>";
                    echo "<td></td>";
                    echo '<td><a class="btn btn-secondary" href="editar_producto.php?id_producto=' . $fila["id_producto"] . '">editar producto</a></td>';
                    echo '<td><form action="" method="post">
                                <input type="hidden" name="fila" value="' . $fila["id_producto"] . '">
                                <input class="btn btn-primary" type="submit" value="borrar producto">
                            </form>
                          </td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>
</html>

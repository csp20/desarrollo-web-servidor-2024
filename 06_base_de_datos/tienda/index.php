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

    require('utiles/conexion.php');
    session_start();
    /*if (isset($_SESSION["usuario"])) {
        echo "<h2>Bienvenid@ " . $_SESSION["usuario"]. "</h2>";
     }else{
        header("location: usuario/iniciar_sesion.php");
        exit;
        //usuario/iniciar_sesion
     }*/
    ?>
</head>
<body>
    <div class="container">
       
        <!--<a class="btn btn-warning" href="usuario/iniciar_sesion.php">iniciar sesion</a>
        <a class="btn btn-warning" href="usuario/cerrar_sesion.php">cerrar sesion</a>
         <input class="btn btn-primary" type="submit" value="iniciar sesion">-->
        <?php
                if (isset($_SESSION["usuario"])) { ?>
                    <br>
                    <a class="btn btn-primary" href="./categorias/index.php">Categorías</a>
                    <a class="btn btn-primary" href="./productos/index.php">Productos</a>
                    <a class="btn btn-warning" href="usuario/cerrar_sesion.php">cerrar sesion</a>
                        
                <?php } else { ?>
                    <br>
                    <a class="btn btn-primary" href="usuario/registro.php">Registrarse</a>
                    <a class="btn btn-warning" href="usuario/iniciar_sesion.php">iniciar sesion</a>
            <?php } ?>
        <h1>tabla de productos</h1>
        
        <br><br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fila"])) {
            $fila = $_POST["fila"];
            /*$sql = "DELETE FROM producto WHERE id_producto = '$fila'";
            $_conexion->query($sql);*/
            //1 prepare
            $sql = $_conexion-> prepare("DELETE FROM producto WHERE id_producto = '$fila'");
            //bind
            $sql -> bind_param("i",$fila);
            //execute
            $sql -> execute();

            $_conexion -> close();

        }

        $sql = "SELECT * FROM producto";
        $resultado = $_conexion->query($sql);

        $_conexion -> close();
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
                        <img width='90' height='100' src="./imagenes/<?php echo $fila["imagen"]; ?>" >
                    </td>
                    <?php
                    echo "<td>" . $fila["descripcion"] . "</td>";
                    echo "<td></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>
</html>

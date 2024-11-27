<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nuevo producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    

        require('../utiles/conexion.php');
    ?>
</head>
<body>
    <?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto = $_POST["id_producto"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $categoria = $_POST["categoria"];
    $stock = $_POST["stock"];
    $imagen = $_POST["imagen"];
    $descripcion = $_POST["descripcion"];


    $sql = "INSERT INTO producto (id_producto, nombre, precio, categoria, stock, imagen, descripcion ) 
    VALUES ('$id_producto','$nombre', '$precio','$categoria', '$stock','$imagen', '$descripcion')";

    $_conexion -> query($sql);

   

    }
    $sql = "SELECT * FROM producto ORDER BY id_producto";
    $resultado = $_conexion -> query($sql);
    $productos = [];

    while($fila = $resultado -> fetch_assoc()) {
        array_push($productos, $fila["id_producto"]);
    }

    ?>
    <h2> crear producto</h2>
    <form class="col-6" action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">id_producto</label>
            <input class="form-control" type="text" name="id_producto">
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">nombre</label>
            <input class="form-control" type="text" name="nombre">
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">precio</label>
            <input class="form-control" type="text" name="precio">
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">categoria</label>
            <input class="form-control" type="text" name="categoria">
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">stock</label>
            <input class="form-control" type="text" name="stock">
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">imagen</label>
            <input class="form-control" type="text" name="imagen">
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">descripcion</label>
            <input class="form-control" type="text" name="descripcion">
        </div>
        <br>
        <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="crear nuevo producto">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
           <!-- <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="iniciar sesion">
                <a class="btn btn-secondary" href="../index.php">Volver</a>
            </div>-->
        </form>
        <!--<div>
            <h3> si no tienes cuenta  create una </h3>
        <a class="btn btn-secondary" href="registro.php"> registrate</a>
        </div>-->
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
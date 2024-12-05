<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);

        session_start();
        require('../utiles/conexion.php');
    ?>
    <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar producto</h1>
        <?php
            $id_producto = $_GET["id_producto"];
            $sql = "SELECT * FROM producto WHERE id_producto = '$id_producto'";
            $resultado = $_conexion->query($sql);
            
            while ($fila = $resultado->fetch_assoc()) {
                $nombre = $fila["nombre"];
                $precio = $fila["precio"];
                $categoria = $fila["categoria"];
                $stock = $fila["stock"];
                $imagen = $fila["imagen"];
                $descripcion = $fila["descripcion"];
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST["nombre"];
                $precio = $_POST["precio"];
                $categoria = $_POST["categoria"];
                $stock = $_POST["stock"];
                $imagen = (isset($_FILES["imagen"]));
                $descripcion = $_POST["descripcion"];

                    $imagen = $_FILES["imagen"]["name"];
                    $ubicacion_temporal = $_FILES["imagen"]["tmp_name"];
                    $ubicacion_final = "../imagenes/$imagen";
                    move_uploaded_file($ubicacion_temporal, $ubicacion_final);

                $sql = "UPDATE producto SET
                    nombre = '$nombre',
                    precio = '$precio',
                    categoria = '$categoria',
                    stock = '$stock',
                    imagen = '$imagen',
                    descripcion = '$descripcion'
                    WHERE id_producto = '$id_producto'
                ";
                $_conexion->query($sql);
            }
        ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">ID Producto</label>
                <input class="form-control" type="text" name="id_producto" value="<?php echo htmlspecialchars($id_producto); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" type="text" name="precio" value="<?php echo htmlspecialchars($precio); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input class="form-control" type="text" name="categoria" value="<?php echo htmlspecialchars($categoria); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" type="text" name="stock" value="<?php echo htmlspecialchars($stock); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input class="form-control" type="text" name="descripcion" value="<?php echo htmlspecialchars($descripcion); ?>">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Confirmar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>
</html>




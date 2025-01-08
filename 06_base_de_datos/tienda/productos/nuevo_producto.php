<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo producto</title>
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
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $tmp_nombre = $_POST["nombre"];
        $tmp_precio = $_POST["precio"];
        $tmp_categoria = $_POST["categoria"];
        $tmp_stock = $_POST["stock"];
        $imagen =isset($_POST["imagen"]);
        $tmp_descripcion = $_POST["descripcion"];


        $imagen = $_FILES["imagen"]["name"];
            $ubicacion_temporal = $_FILES["imagen"]["tmp_name"];
            $ubicacion_final = "../imagenes/$imagen";
            move_uploaded_file($ubicacion_temporal, $ubicacion_final);


        if ($tmp_nombre == '') {
            $error_nombre = "El nombre es obligatorio.";
        } else {
            $patron = "/^[a-zA-Z0-9 çáéíóúÁÉÍÓÚÑñüÜ]+$/";
            if (!preg_match($patron, $tmp_nombre)) {
                $error_nombre = "El nombre solo puede contener letras, números y espacios en blanco.";
            } else {
                if (strlen($tmp_nombre) < 2) {
                    $error_nombre = "El nombre debe tener al menos 2 caracteres.";
                } else {
                    $nombre = $tmp_nombre;                 
                }
            }
        }

        if ($tmp_precio == '') {
            $error_precio = "El precio es obligatorio.";
        } else {
            $patron_precio = "/^[0-9]{1,4}(\.[0-9]{1,2})?$/";
            if (!preg_match($patron_precio, $tmp_precio)) {
                $error_precio = "El precio debe ser un número con 4 dígitos enteros máximo y 2 decimales.";
            } else {
                if ($tmp_precio < 0) {
                    $error_precio = "El precio debe ser un número positivo.";
                } else {
                    $precio = $tmp_precio;
                }
            }
        }

        if ($tmp_categoria == '') {
            $error_categoria = "La categoría es obligatoria.";
        } else {
            $categoria = $tmp_categoria;
        }

        if ($tmp_stock == '') {
            $error_stock = "El stock es obligatorio.";
        } else {
            $patron_stock = "/^[0-9]+$/";
            if (!preg_match($patron_stock, $tmp_stock)) {
                $error_stock = "El stock debe ser un número.";
            } else {
                if ($tmp_stock < 0) {
                    $error_stock = "El stock debe ser un número positivo.";
                } else {
                    $stock = $tmp_stock;
                }
            }
        }

        if ($tmp_descripcion == '') {
            $error_descripcion = "La descripción es obligatoria.";
        } else {
            if (strlen($tmp_descripcion) > 255) {
                $error_descripcion = "La descripción no puede tener más de 255 caracteres.";
            } else {
                $descripcion = $tmp_descripcion;
            }
        }

        if (!isset($error_nombre) && !isset($error_precio) && !isset($error_categoria) && !isset($error_stock) && !isset($error_imagen) && !isset($error_descripcion)) {
            $sql = "INSERT INTO producto ( nombre, precio, categoria, stock, imagen, descripcion) 
                    VALUES ( '$nombre', '$precio', '$categoria', '$stock', '$imagen', '$descripcion')";
            $_conexion->query($sql);
        }
    }
    ?>
    <h2>Crear producto</h2>
    <form class="col-6" action="" method="post" enctype="multipart/form-data">
        
        <br>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input class="form-control" type="text" name="nombre">
            <?php if(isset($error_nombre)) echo "<span class='error'>$error_nombre</span>" ?>
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input class="form-control" type="text" name="precio">
            <?php if(isset($error_precio)) echo "<span class='error'>$error_precio</span>" ?>
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <input class="form-control" type="text" name="categoria">
            <?php if(isset($error_categoria)) echo "<span class='error'>$error_categoria</span>" ?>
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input class="form-control" type="text" name="stock">
            <?php if(isset($error_stock)) echo "<span class='error'>$error_stock</span>" ?>
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label" for="imagen">imagen</label>
            <input class="form-control" type="file" name="imagen">
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <input class="form-control" type="text" name="descripcion">
            <?php if(isset($error_descripcion)) echo "<span class='error'>$error_descripcion</span>" ?>
        </div>
        <br>
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Crear nuevo producto">
            <a class="btn btn-secondary" href="index.php">Volver</a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>
</html>

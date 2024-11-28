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
        //if (isset($_GET["id_producto"])) {
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
        /*} else {
            echo "ID de producto no especificado.";
            exit;
        }*/

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre = $_POST["nombre"];
            $tmp_precio = $_POST["precio"];
            $tmp_categoria = $_POST["categoria"];
            $tmp_stock = $_POST["stock"];
            $tmp_imagen = $_POST["imagen"];
            $tmp_descripcion = $_POST["descripcion"];

            
            if ($tmp_nombre == '') {
                $error_nombre = "El nombre es obligatorio.";
            } else {
                $patron = "/^[a-zA-Z0-9 çáéíóúÁÉÍÓÚÑñüÜ]+$/";
                if (!preg_match($patron, $tmp_nombre)) {
                    $error_nombre = "El nombre no es correcto, solo puede contener letras, números y espacios en blanco.";
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
                $patron_precio = "/^\d{1,4}(\.\d{1,2})?$/";
                if (!preg_match($patron_precio, $tmp_precio)) {
                    $error_precio = "El precio debe ser un número con hasta 4 dígitos enteros y 2 decimales.";
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
                        $error_stock = "El stock debe ser un número no negativo.";
                    } else {
                        $stock = $tmp_stock;
                    }
                }
            }

            if ($tmp_imagen == '') {
                $error_imagen = "La imagen es obligatoria.";
            } else {
                $imagen = $tmp_imagen;
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
                <?php if(isset($error_nombre)) echo "<span class='error'>$error_nombre</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" type="text" name="precio" value="<?php echo htmlspecialchars($precio); ?>">
                <?php if(isset($error_precio)) echo "<span class='error'>$error_precio</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input class="form-control" type="text" name="categoria" value="<?php echo htmlspecialchars($categoria); ?>">
                <?php if(isset($error_categoria)) echo "<span class='error'>$error_categoria</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" type="text" name="stock" value="<?php echo htmlspecialchars($stock); ?>">
                <?php if(isset($error_stock)) echo "<span class='error'>$error_stock</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" type="text" name="imagen" value="<?php echo htmlspecialchars($imagen); ?>">
                <?php if(isset($error_imagen)) echo "<span class='error'>$error_imagen</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input class="form-control" type="text" name="descripcion" value="<?php echo htmlspecialchars($descripcion); ?>">
                <?php if(isset($error_descripcion)) echo "<span class='error'>$error_descripcion</span>" ?>
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





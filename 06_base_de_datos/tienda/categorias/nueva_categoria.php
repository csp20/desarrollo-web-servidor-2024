<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva categoría</title>
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
        $tmp_categoria = $_POST["categoria"];
        $tmp_descripcion = $_POST["descripcion"];

        if ($tmp_categoria == '') {
            $error_categoria = "La categoría es obligatoria.";
        } else {
            $patron_categoria = "/^[a-zA-Z çáéíóúÁÉÍÓÚÑñüÜ]+$/";
            if (!preg_match($patron_categoria, $tmp_categoria)) {
                $error_categoria = "La categoría solo puede contener letras y espacios en blanco.";
            } else {
                if (strlen($tmp_categoria) < 2) {
                    $error_categoria = "La categoría debe tener al menos 2 caracteres.";
                } else {
                    $sql2 = "SELECT * FROM categorias WHERE categoria = '$tmp_categoria'";
                    $resultado2 = $_conexion->query($sql2);
                    if ($resultado2->num_rows > 0) {
                        $error_categoria = "La categoría ya existe.";
                    } else {
                        $categoria = $tmp_categoria;
                    }
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

        if (!isset($error_categoria) && !isset($error_descripcion)) {
            $sql = "INSERT INTO categorias (categoria, descripcion) 
                    VALUES ('$categoria', '$descripcion')";
            $_conexion->query($sql);
                
        }
    }
    ?>
    <h2>Crear categoría</h2>
    <form class="col-6" action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <input class="form-control" type="text" name="categoria">
            <?php if(isset($error_categoria)) echo "<span class='error'>$error_categoria</span>" ?>
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <input class="form-control" type="text" name="descripcion">
            <?php if(isset($error_descripcion)) echo "<span class='error'>$error_descripcion</span>" ?>
        </div>
        <br>
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Crear nueva categoría">
            <br><br>
            <a class="btn btn-secondary" href="index.php">Volver</a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoría</title>
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
        <h1>Editar categoría</h1>
        <?php
            $descripcion = "";
            $categoria = $_GET["categoria"];
            //$sql = "SELECT * FROM categorias WHERE categoria = '$categoria'";
            //$resultado = $_conexion->query($sql);

            // Preparar la sentencia
            $sql = $_conexion->prepare("SELECT * FROM categorias WHERE categoria = ?");

            // Vincular el parámetro
            $sql->bind_param("s", $categoria);

            // Ejecutar la sentencia
            $sql->execute();

            // Obtener el resultado
            $resultado = $sql->get_result();


            while ($fila = $resultado->fetch_assoc()) {
                $descripcion = $fila["descripcion"];
            }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_categoria = $_POST["categoria"];
            $tmp_descripcion = $_POST["descripcion"];

            if ($tmp_descripcion == '') {
                $error_descripcion = "La descripción es obligatoria.";
            } else {
                if (strlen($tmp_descripcion) > 255) {
                    $error_descripcion = "La descripción no puede tener más de 255 caracteres.";
                } else {
                    $descripcion = $tmp_descripcion;
                }
            }

            if (!isset($error_descripcion)) {
                //$sql = "UPDATE categorias SET descripcion = '$descripcion' WHERE categoria = '$categoria'";
                //$_conexion->query($sql);

                //1 prepare
                $sql = $_conexion->prepare( "UPDATE categorias SET descripcion = ? WHERE categoria = ?");
                //2 binding
                $sql-> bind_param("ss",$descripcion, $categoria);
                //3 execute
                $sql->execute();

                //cierro
                $conexion -> close();
            }
        }
        ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input class="form-control" type="text" name="categoria" value="<?php echo htmlspecialchars($categoria); ?>" readonly>
                <?php if(isset($error_categoria)) echo "<span class='error'>$error_categoria</span>" ?>
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nueva categoria</title>
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
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];


    $sql = "INSERT INTO categorias (categoria, descripcion) 
    VALUES ('$categoria', '$descripcion')";

    $_conexion -> query($sql);

    }
    ?>
    <h2> crear categoria</h2>
    <form class="col-6" action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">categoria</label>
            <input class="form-control" type="text" name="categoria">
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">descripcion</label>
            <input class="form-control" type="text" name="descripcion">
        </div>
        <br>
        <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="crear nueva categoria">
                <br> <br>
               
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nueva categoria</title>
</head>
<body>
    <?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];


    }
    ?>
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
                <input class="btn btn-primary" type="submit" value="editar categoria">
                <br> <br>
                <input class="btn btn-primary" type="submit" value="borrar categoria">
                <br> <br>
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
    </form>
</body>
</html>
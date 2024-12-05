<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    
        require('../utiles/conexion.php');
    ?>
</head>
<body>
    <div class="container">
        <h1>registro</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];

            $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";
            $_conexion -> query($sql);

            header("location: iniciar_sesion.php");
            exit;
        }
        //print_r($estudios);
 
        ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">usuario</label>
                <input class="form-control" type="text" name="usuario">
            </div>
            <div class="mb-3">
                <label class="form-label">contraseña</label>
                <input class="form-control" type="password" name="contrasena">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Insertar">
                 <!--<a class="btn btn-secondary" href="iniciar_sesion.php">iniciar sesion</a>
               <a class="btn btn-secondary" href="../index.php">Volver</a>-->
            </div>
        </form>
        <div>
            <h3> si ya tienes cuenta inicia sesion</h3>
        <a class="btn btn-secondary" href="iniciar_sesion.php">iniciar sesion</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
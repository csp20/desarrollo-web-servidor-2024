<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iniciar sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );    
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
        <h1>iniciar sesion</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];
            
           $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
           $resultado = $_conexion -> query($sql);
           
           if ($resultado -> num_rows == 0) {
                //echo "<h2>el usuario $usuario no existe</h2>";
                $error_inicio_usu = "<h2>el usuario $usuario no existe</h2>";
           }else{
            $datos_usuario = $resultado -> fetch_assoc();
            $acceso_concedido = password_verify($contrasena, $datos_usuario["contrasena"]);
            if ($acceso_concedido) {
               session_start();
               $_SESSION["usuario"] = $usuario;
               header("location: ../index.php");
               exit;
            }else{
                //echo "<h2> la contraseña es incorrecta </h2>";
                $error_inicio_con = "<h2> la contraseña es incorrecta </h2>";
            }
           }
        }
 
        ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">usuario</label>
                <input class="form-control" type="text" name="usuario">
                <?php if(isset($error_inicio_usu)) echo "<span class='error'>$error_inicio_usu</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">contraseña</label>
                <input class="form-control" type="password" name="contrasena">
                <?php if(isset($error_inicio_con)) echo "<span class='error'>$error_inicio_con</span>" ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="iniciar sesion">
                <a class="btn btn-secondary" href="../index.php">Volver</a>
            </div>
        </form>
        <div>
            <h3> si no tienes cuenta  create una </h3>
        <a class="btn btn-secondary" href="registro.php"> registrate</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
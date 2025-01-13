<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
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
        <h1>registro</h1>
        <?php
        $usuario = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_usuario = $_POST["usuario"];
            $tmp_contrasena = $_POST["contrasena"];

            if ($tmp_usuario == '') {
                $error_usuario = "El usuario es obligatorio";
            } else {
                $patron = "/^[a-zA-Z_0-9]+$/";
                if (!preg_match($patron, $tmp_usuario)) {
                    $error_usuario = "El usuario solo puede tener letras y números";
                } else {
                    if (strlen($tmp_usuario) < 3 || strlen($tmp_usuario) > 15) {
                        $error_usuario = "El usuario debe tener entre 3 y 15 caracteres";
                    } else {
                        $usuario = $tmp_usuario;
                    }
                }
            }

            if ($tmp_contrasena == '') {
                $error_contrasena = "La contraseña es obligatoria";
            } else {
                $patron = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}$/";
                if (!preg_match($patron, $tmp_contrasena)) {
                    $error_contrasena = "La contraseña debe tener mayúsculas, minúsculas, números y caracteres especiales";
                } else {
                    if (strlen($tmp_contrasena) < 8 || strlen($tmp_contrasena) > 15) {
                        $error_contrasena = "La contraseña debe tener entre 8 y 15 caracteres";
                    } else {
                        $contrasena = $tmp_contrasena;
                    }
                }
            }

            if (isset($error_usuario) && isset($error_contrasena)) {
                /*$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
                $resultado = $_conexion->query($sql);*/
                //1 prepare
                $sql = $_conexion -> prepare("SELECT * FROM usuarios WHERE usuario = ?");
                //bind
                $sql -> bind_param("s",$usuario);
                // execute
                $sql -> execute();

                $_conexion -> close();


                if ($resultado->num_rows > 0) {
                    echo "<h2>El nombre de usuario ya existe. Por favor, elige otro.</h2>";
                } else {
                    $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$contrasena_cifrada')";
                    $_conexion->query($sql);
                    header("location: iniciar_sesion.php");
                    exit;
                }
            }
        }
        ?>
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">usuario</label>
                <input class="form-control" type="text" name="usuario" required>
                <?php if (!empty($error_usuario)) echo "<span class='error'>$error_usuario</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">contraseña</label>
                <input class="form-control" type="password" name="contrasena" required>
                <?php if (!empty($error_contrasena)) echo "<span class='error'>$error_contrasena</span>"; ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Insertar">
            </div>
        </form>
        <div>
            <h3>si ya tienes cuenta, inicia sesión</h3>
            <a class="btn btn-secondary" href="iniciar_sesion.php">iniciar sesión</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


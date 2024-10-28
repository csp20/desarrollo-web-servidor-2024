<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    ?>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>

    <div class="container">
    <!-- Content here -->
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_usuario = $_POST["usuario"];
            $tmp_nombre = $_POST["nombre"];
            $tmp_apellidos = $_POST["apellidos"];
        }
        if ($tmp_usuario == "") {
            $error_usuario = "el usuario es obligatorio";
        }else{
            //letras a-z A-Z nums y _ 
            $patron = "/^[a-zA-Z0-9_]{4,12}$/";
            if (!preg_match($patron,$tmp_usuario)) {
                $error_usuario = "el usuario debe contener de 4 a 12 letras,num o _";
            }else{
                $usuario = $tmp_usuario;
            }
        }
        if ($tmp_nombre == "") {
          $error_usuario = "el nombre es obligatorio";

        }else {
            if (strlen($tmp_nombre) < 2 || strlen($tmp_nombre) >40) {
               $error_nombre = "el nombre debe tener entre 2 y 40 chars";
            }else{
                //letras, espacios en blnco y tilde
                $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑÜü]+$/";
                if (!preg_match($patron,$tmp_nombre)) {
                    $error_nombre = "el nombre solo puede contener letras y espacios";

                }else{
                    $nombre = $tmp_nombre;
                }
            }
        } 
        if ($tmp_apellidos == "") {
            $error_apellidos = "el apellido es obligatorio";
        }else{
            if (strlen($tmp_apellidos) < 2 || strlen($tmp_apellidos) >40) {
                $error_apellidos = "el apellido debe tener entre 2 y 40 chars";
             }else{
                 //letras, espacios en blnco y tilde
                 $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑÜü]+$/";
                 if (!preg_match($patron,$tmp_apellidos)) {
                     $error_apellidos = "el apellido solo puede contener letras y espacios";
 
                 }else{
                     $apellidos = $error_apellidos;
                 }
             }
        }
        

    ?>
    
    <h2> form usuario</h2>
    

    <form class="col-4" action="" method="post">
        <div class="mb-3">
        <label class="form-label">usuario</label>
        <input class="form-control" type="text" name="usuario">
        <?php if(isset($error_usuario))echo"<span class='error'> $error_usuario </span>" ?>
        </div>

        <div class="mb-3">
        <label class="form-label">nombre</label>
        <input class="form-control" type="text" name="nombre">
        </div>
        
        <div class="mb-3">
        <label class="form-label">apellidos</label>
        <input class="form-control" type="text" name="apellidos">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" value="enviar">
        </div>



    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
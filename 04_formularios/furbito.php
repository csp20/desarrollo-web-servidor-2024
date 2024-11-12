<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    require('../05_funciones/fun_depurar.php');
    ?>
    <!--Malaga C.F
    Equipos de la liga
    - Nombre (letras con tilde, ñ, espacios en blanco y punto)
    - Inicial (3 letras)
    - Liga (select con las opciones. Liga EA Sports, Liga Hypermotion, Liga Primera RFEF)
    - Ciudad (letras con tilde, ñ, ç y espacios en blanco)
    - Tiene titulo liga (radio button con si o no)
    - Fecha de fundacion (entre hoy y el 18 de diciembre de 1889)
    - Numero de jugadores (entre 22 y 32)
    -->
</head>
<body>
    <?php
     if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_nombre = $_POST["nombre"];
        $tmp_inicial = $_POST["inicial"];
        /*$tmp_liga = isset($_POST["liga"]);
        $tmp_ciudad = $_POST["ciudad"];
        $tmp_titulo = isset($_POST["titulo"]);
        $tmp_fechaFun = $_POST["fechaFun"];
        $tmp_numJug = $_POST["numJug"];*/


        depurar( $tmp_nombre);
        if ($tmp_nombre == '') {
            $error_nombre = "el nombre es obligatorio";
        }else {
            $patron = "/^[a-zA-Z çáéíóúÁÉÍÓÚÑñüÜ]+$/";
            if (!preg_match($patron,$tmp_nombre)) {
                $error_nombre = "el nombre no es correcto solo puede contener letras y espacios
                            en blanco";
            }else {
                $nombre = $tmp_nombre;
            }
        }
        depurar( $tmp_inicial);
        if ($tmp_inicial == '') {
            $error_inicial = "la inicial es obligatoria";
        }else {
            if(strlen($tmp_inicial) != 3) {
                $error_inicial = "las iniciales deben ser 3 letras"; 
            }else {
                $patron = "/^[A-Z ÁÉÍÓÚÑÜ]+$/";
            if (!preg_match($patron,$tmp_inicial)) {
                $error_inicial = "la inicial deben ser en mayusculas";
            }else {
                $inicial = $tmp_inicial;
            }
            }
            
        }
    }
    ?>
    <form action="" method="POST">
        <h3>validacion equipos de furbo</h3>
        <label>nombre</label>
        <input type="text" name="nombre">
        <?php if(isset($error_nombre)) echo "<span class='error'>$error_nombre</span>" ?>
        <br><br>
        <label>inicial</label>
        <input type="text" name="inicial">
        <?php if(isset($error_inicial)) echo "<span class='error'>$error_inicial</span>" ?>
        <br><br>
        <input type="submit" value="enviar">

    </form>
</body>
</html>
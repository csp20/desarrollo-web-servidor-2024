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
    <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>
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
        $tmp_titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : ''; 
        $tmp_ciudad = $_POST["ciudad"]; 
        $tmp_liga = isset($_POST["liga"]) ? $_POST["liga"] : '';
        $tmp_fechaFun = $_POST["fechaFun"];
        $tmp_numJug = $_POST["numJug"];
        /* */
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
        if ($tmp_titulo == '') {
            $error_titulo = "es obligatorio rellenar este campo";
        }else {
            $opciones_validas = ["si","no"];
            if (!in_array($tmp_titulo,$opciones_validas)) {
                $error_titulo = "respuesta no valida";
            }else {
                $titulo = $tmp_titulo;
            }
        }

        depurar( $tmp_ciudad);
        if ( $tmp_ciudad == '') {
           $error_ciudad = "la ciudad es obligatoria";
        }else {
            $patron = "/^[a-zA-Z çáéíóúÁÉÍÓÚÑñüÜ]+$/";
            if (!preg_match($patron,$tmp_ciudad)) {
                $error_ciudad = "la ciudad solo debe contener letras";
            }else {
                $ciudad = $tmp_ciudad;
            }
        }
        if ($tmp_liga == '') {
            $error_liga = "la liga es obligatoria";
        }else {
            $tipos_ligas = ["Liga EA Sports", "Liga Hypermotion", "Liga Primera RFEF"];
            if (!in_array($tmp_liga,$tipos_ligas)) {
                $error_liga = "opcion no valida";
            }else {
                $liga = $tmp_liga;
            }
        }
        depurar($tmp_fechaFun);
        if ($tmp_fechaFun == '') {
           $error_fecha = "la fecha es obligatoria";
        }else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if (!preg_match($patron,$tmp_fechaFun)) {
               $error_fecha = "el formato de fecha es incorrecto";
            }else {
              $fecha_min = "1880-12-18";
              $fecha_max = date('Y-m-d');
              if ($tmp_fechaFun<$fecha_min || $tmp_fechaFun >$fecha_max) {
                $error_fecha = " la fecha se sale de los intervalos permitidos";
              }else {
                $fechaFun = $tmp_fechaFun;
              }
            }
        }
        depurar($tmp_numJug);
        if ($tmp_numJug == '') {
            $error_numJug = "este campo es obligatorio, rellenalo";
        }else {
            if (strlen($tmp_numJug)!=2) {
                $error_numJug = "deben ser 2 cifras ";
            }else {
                $patron = "/^[0-9]{2}$/";
                if (!preg_match($patron,$tmp_numJug)) {
                   $error_numJug = " deben ser numeros";
                }else {
                    if ($tmp_numJug < 22 || $tmp_numJug >32) {
                       $error_numJug = "deben ser entre 22 y 32 jugadores";
                    }else {
                        $numjug = $tmp_numJug;
                    }
                    
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
        <div>
            <label>titulo</label> <br><br>
            <input type="radio" name="titulo" value="si">
            <label >si</label>
            <br><br>
            <input type="radio" name="titulo" value="no">
            <label >no</label>
        </div>
        <br>
        <?php if(isset($error_titulo)) echo "<span class='error'>$error_titulo</span>" ?>
        <br>
        <label>ciudad</label> <br>
        <input type="text" name="ciudad">
        <?php if(isset($error_ciudad)) echo "<span class='error'>$error_ciudad</span>" ?>
        <br><br>
        <label>liga</label> <br><br>
        <select name ="liga">
            <option disabled selected hidden>--- Especifica la liga ---</option>
            <option value="Liga EA Sports">Liga EA Sports</option>
            <option value="Liga Hypermotion">Liga Hypermotion</option>
            <option value="Liga Primera RFEF"> Liga Primera RFEF</option>
        </select>
        <br><br>
        <?php if(isset($error_liga)) echo "<span class='error'>$error_liga</span>" ?>
        <br>
        <label>fecha fundacion</label> <br>
        <input type="date" name="fechaFun">
        <?php if(isset($error_fecha)) echo "<span class='error'>$error_fecha</span>" ?>
        <br><br>
        <label>num de jugadores</label> <br>
        <input type="text" name="numJug">
        <?php if(isset($error_numJug)) echo "<span class='error'>$error_numJug</span>" ?>
        <br><br>
        <input type="submit" value="enviar">

        <?php
        if(isset($nombre) && isset($inicial) && isset($titulo) && isset($ciudad) && isset($liga) && isset($fechaFun)) { ?>
            <h3><?php echo $nombre ?></h3>
            <h3><?php echo $inicial ?></h3>
            <h3><?php echo $titulo ?></h3>
            <h3><?php echo $ciudad ?></h3>
            <h3><?php echo $liga ?></h3>
            <h3><?php echo $fechaFun ?></h3>

        <?php } ?>

    </form>
</body>
</html>
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
</head>
<body>
    <!-- 
    -titulo = 1-80 caracteres, cualquier caracter
    -consola = Nintendo Switch, PS5, PS4, Xbox Series X/S, PC
	(radio button)
    -fecha de lanzamiento = el videojuego mas antiguo admisible será del 1 de enero de 1957, 
    y el más en el futuro no podrá dentro de más de 5 años (dinámico)
    -pegi = 3,7,12,16,18 (select)
    -descripcion = 0-255 caracteres, cualquier caracter (campo opcional) - (text area)

    - LIMPIAR LOS DATOS DEL FORMULARIO Y VALIDARLOS
    - MOSTRAR TODO POR PANTALLA
    -->
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_titulo = $_POST["titulo"];
        $tmp_consola = isset($_POST["consola"]);
        $tmp_fecha = $_POST["fecha"];
        $tmp_pegi = isset($_POST["pegi"]);

        depurar( $tmp_titulo);
        if ($tmp_titulo == '') {
            $error_titulo = "el titulo es obligatorio";
        }else {
            if ( strlen($tmp_titulo) >50) {
                $error_titulo = "el titulo debe tener maximo 50 chars";
            }else {
                //letras, espacios en blnco y tilde
                $patron = "/^[a-zA-Z0-9 áéíóúÁÉÍÓÚñÑÜü.,:;!?()]+$/";
                if (!preg_match($patron,$tmp_titulo)) { 
                    $error_titulo = "el titulo solo puede contener letras y espacios";

                }else{
                    $titulo = $tmp_titulo;
                }
            }
        }
        
        if ($tmp_consola == '') {
            $error_consola =  " elegir la plataforma o consola es obligatorio";
        }else {
           $valores_validos_consola = ["PS4", "PS5", "PC","Nintendo_Switch","XBOX_Series_S/X"];
           if (!in_array($tmp_consola,$valores_validos_consola)) {
            $error_consola =  " la consola debe ser PS4, PS5, PC, Nintendo_Switch, XBOX_Series_S/X";
           }else  $consola = $tmp_consola;
        }

        depurar( $tmp_fecha);
        if ($tmp_fecha == '') {
            $error_fecha = "La fecha de lanzamiento es obligatoria.";
        }else {
            //letras, espacios en blnco y tilde
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron, $tmp_fecha)) {
                $error_fecha = "Formato de fecha incorrecto";

            }else {
                $tmp_fecha = strtotime($tmp_fecha);
                $fecha_min = strtotime("1957-01-01");
                $fecha_max = strtotime((new DateTime())->modify('+5 years')->format('Y-m-d'));

                if ($tmp_fecha < $fecha_min) {
                    $error_fecha = "la fecha debe ser posterior a 1957";
                }elseif ($tmp_fecha > $fecha_max) {
                    $error_fecha = "la fecha debe ser posterior a 1957";
                }else {
                    $fecha = date("Y-m-d", $tmp_fecha);
                }
            }
            
        }

        if ($tmp_pegi == '') {
            $error_pegi =  " elegir la plataforma o consola es obligatorio";
        }else {
           $valores_validos_pegi = ["3", "7", "12","16","18"];
           if (!in_array($tmp_pegi,$valores_validos_pegi)) {
            $error_pegi =  " el pegi debe ser 3, 7, 12, 16, 18";
           }else  $pegi = $tmp_pegi;
        }

    }


    ?>
    <form action=""  method="post">
        <label> titulo</label><br><br>
        <input type="text" name="titulo">
        <?php if(isset($error_titulo)) echo "<span class='error'>$error_titulo</span>" ?>
    
        <br><br>
        <label>plataforma</label><br><br>
        <select name="consola">
            <option disabled selected hidden>--- Elige la plataforma ---</option>
            <option value="PS4">PS4</option>
            <option value="PS5">PS5</option>
            <option value="Nintendo_Switch">Nintendo Switch</option>
            <option value="XBOX_Series_S/X"> XBOX Series S/X</option>
            <option value="PC">PC</option>
        </select>
        <?php if (isset($error_consola)) echo "<span class='error'> $error_consola</span>"; ?>
        <br><br>
        <label> fecha</label><br><br>
        <input type="text" name="fecha">
        <?php if (isset($error_fecha)) echo "<span class='error'> $error_fecha</span>"; ?>
        <br><br>
        <label> pegi</label><br><br>
        <select name="pegi">
            <option disabled selected hidden>--- Especifica el pegi ---</option>
            <option value="3">3</option>
            <option value="7">7</option>
            <option value="12"> 12</option>
            <option value="16"> 16</option>
            <option value="18">18</option>
        </select>
        <?php if (isset($error_pegi)) echo "<span class='error'> $error_pegi</span>"; ?>
        <!--
        <label> descripcion</label>
        <input type="text" name="descripcion"> -->
        <br>
        <br>
        <input type="submit" value="enviar">
    </form>
    <div>
    <?php
        if(isset($titulo) && isset($consola) && isset($fecha)) { ?>
            <h1><?php echo $titulo ?></h1>
            <h1><?php echo $consola ?></h1>
            <h1><?php echo $fecha ?></h1>
            <h1><?php echo $pegi ?></h1>
        <?php } ?>
    </div>
</body>
</html>
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
        $tmp_consola = isset($_POST["consola"]) ? $_POST["consola"]: '';
        $tmp_fecha = $_POST["fecha"];
        $tmp_pegi = isset($_POST["pegi"]) ? $_POST["pegi"]: '';

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
        
        if($tmp_consola == '') {
            $err_consola = "La consola es obligatoria";
        } else {
            $consolas_validas = ["ps4","ps5","switch","xboxsx"];
            if(!in_array($tmp_consola,$consolas_validas)) {
                $err_consola = "La consola no es válida";
            } else {
                $consola = $tmp_consola;
            }
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
               // $tmp_fecha = strtotime($tmp_fecha);
                //$fecha_min = strtotime("1957-01-01");
                //$fecha_max = strtotime((new DateTime())->modify('+5 years')->format('Y-m-d'));
                $fecha_min = '1947-01-01';
                $fecha_max = date('Y-m-d',strtotime('+5 years'));

                if ($tmp_fecha < $fecha_min || $tmp_fecha > $fecha_max) {
                    $error_fecha = "la fecha debe ser posterior a 1947";
                }else {
                    $fecha =  $tmp_fecha;
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
        <div class="container">
        <!--<h1>Formulario de videojuegos</h1>-->
        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="ps4">
                    <label class="form-check-label">Playstation 4</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="ps5">
                    <label class="form-check-label">Playstation 5</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="switch">
                    <label class="form-check-label">Nintendo Switch</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="xboxsx">
                    <label class="form-check-label">XBox Series X/S</label>
                </div>
                <?php if(isset($err_consola)) echo "<span class='error'>$err_consola</span>" ?>
            </div>
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
        <?php } 
        
        //revisar code alejandra(alesa95)-> videojuegos.php
        //comparar y corregir
        
        ?>
        <!--ALTERNATIVA ALEJANDRA 
        
         if($tmp_fecha_lanzamiento == '') {
            $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria";
        } else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron, $tmp_fecha_lanzamiento)) {
                $err_fecha_lanzamiento = "Formato de fecha incorrecto";
            } else {
                list($anno_lanzamiento,$mes_lanzamiento,$dia_lanzamiento) =
                    explode('-',$tmp_fecha_lanzamiento);
                if($anno_lanzamiento < 1947) {
                    $err_fecha_lanzamiento = "El año no puede ser anterior a 1947";
                } else {
                    $anno_actual = date("Y");
                    $mes_actual = date("m");
                    $dia_actual = date("d");

                    if($anno_lanzamiento - $anno_actual < 5) {
                        $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                    } elseif($anno_lanzamiento - $anno_actual > 5) {
                        $err_fecha_lanzamiento = "La fecha debe ser anterior a dentro de 5 años";
                    } elseif($anno_lanzamiento - $anno_actual == 5) {
                        if($mes_lanzamiento - $mes_actual < 0) {
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        } elseif($mes_lanzamiento - $mes_actual > 0) {
                            $err_fecha_lanzamiento = "La fecha debe ser anterior a dentro de 5 años";
                        } elseif($mes_lanzamiento - $mes_actual == 0) {
                            if($dia_lanzamiento - $dia_actual <= 0) {
                                $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            } elseif($dia_lanzamiento - $dia_actual > 0) {
                                $err_fecha_lanzamiento = "La fecha debe ser anterior a dentro de 5 años";
                            }
                        }
                    }
                }
            }

        -->
</div>
</body>
</html>
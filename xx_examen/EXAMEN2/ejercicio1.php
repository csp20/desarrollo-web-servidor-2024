<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
   // require('depurarcode.php');
    ?>
    <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body> <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $tmp_titulo = $_POST["titulo"]; //nombre
            $tmp_paginas = $_POST["paginas"]; //numjug
            $tmp_genero = isset($_POST["genero"]) ? $_POST["genero"] : ''; //radiobutton
            $tmp_secuela = isset($_POST["secuela"]) ? $_POST["secuela"] : ''; //select
            $tmp_fecha = $_POST["fecha"];
            $tmp_sinopsis = $_POST["sinopsis"];
            

                //depurarcode($tmp_titulo);
                if ($tmp_titulo == '') {
                    $error_titulo = "el titulo es obligatorio";
                }else {
                    if(strlen($tmp_titulo) <1 || strlen($tmp_titulo) >40) {
                        $error_titulo = "el titulo debe ser entre 1 y 40 caracteres"; 
                    }else {
                        $patron = "/^[a-zA-Z 0-9 çáéíóúÁÉÍÓÚÑñüÜ,.;]+$/";;
                    if (!preg_match($patron,$tmp_titulo)) {
                        $error_titulo = "el titulo no es correcto, debe contener letras num y caracteres";
                    }else {
                        $titulo = $tmp_titulo;
                    }
                }
                //depurarcode($tmp_paginas);
                if ($tmp_paginas == '') {
                    $error_paginas = "el num de paginas  es obligatorio, rellenalo";
                }else {
                    if (strlen($tmp_paginas)<2 || strlen($tmp_paginas) >4) {
                        $error_paginas = "deben ser entre 2 y 4cifras ";
                    }else {
                        $patron = "/^[0-9]{2,4}$/";
                        if (!preg_match($patron,$tmp_paginas)) {
                        $error_paginas = " deben ser numeros";
                        }else {
                            if ($tmp_paginas < 10 || $tmp_paginas >9999) {
                            $error_paginas = "deben ser entre 10 y 9999 paginas";
                            }else {
                                $paginas = $tmp_paginas;
                            }
                            
                        }
                    }
                }

                if ($tmp_genero == '') {
                    $error_genero = "es obligatorio rellenar el genero";
                }else {
                    $opciones_validas = ["fantasia","cienciaFiccion","romance","drama"];
                    if (!in_array($tmp_genero,$opciones_validas)) {
                        $error_genero = "respuesta no valida";
                    }else {
                        $genero = $tmp_genero;
                    }
                }

                if ($tmp_secuela == '') {
                    $error_secuela = "la secuela es obligatorio responderla";
                }else {
                    $tipos_ligas = ["si", "no"];
                    if (!in_array($tmp_secuela,$tipos_ligas)) {
                        $error_secuela = "opcion no valida";
                    }else {
                        $secuela = $tmp_secuela;
                    }
                }

                if ($tmp_fecha == '') {
                    $error_fecha = "La fecha de lanzamiento es obligatoria.";
                }else {
                    //letras, espacios en blnco y tilde
                    $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                    if(!preg_match($patron, $tmp_fecha)) {
                        $error_fecha = "Formato de fecha incorrecto";
        
                    }else { 
                        $fecha_min = '1800-01-01';
                        $fecha_max = date('Y-m-d',strtotime('+3 years'));
        
                        if ($tmp_fecha < $fecha_min || $tmp_fecha > $fecha_max) {
                            $error_fecha = "la fecha debe ser posterior a 1800 y no mas  de 3 años del dia de hoy";
                        }else {
                            $fecha =  $tmp_fecha;
                        }
                    }
                }

                if ( $tmp_sinopsis != '') {
                   
                    $patron = "/^[a-zA-Z çáéíóúÁÉÍÓÚÑñüÜ]+$/";
                    if (!preg_match($patron,$tmp_sinopsis)) {
                         $error_sinopsis = "la ciudad solo debe contener letras";
                    }else {
                        if ($tmp_sinopsis>1 || $tmp_sinopsis <200 ) {
                            $sinopsis = $tmp_sinopsis;
                        }
                         
                    }
                }
            }
        }
        
        
        ?>
        <form action="" method="POST">
            <h3>validacion libros</h3>
            <label>titulo</label>
            <input type="text" name="titulo">
            <?php if(isset($error_titulo)) echo "<span class='error'>$error_titulo</span>" ?>
            <br><br>
            <label>num de paginas</label> <br>
            <input type="text" name="paginas">
            <br>
            <?php if(isset($error_paginas)) echo "<span class='error'>$error_paginas</span>" ?>
            <br><br>
            <div>
                <label>genero</label> <br><br>
                <input type="radio" name="genero" value="fantasia">
                <label >fantasia</label>
                <br><br>
                <input type="radio" name="genero" value="cienciaFiccion">
                <label >ciencia ficcion</label>
                <br><br>
                <input type="radio" name="genero" value="romance">
                <label >romance</label>
                <br><br>
                <input type="radio" name="genero" value="drama">
                <label >drama</label>
            </div>
            <br>
            <?php if(isset($error_genero)) echo "<span class='error'>$error_genero</span>" ?>
            <br><br>
            <label>liga</label> <br><br>
            <select name ="secuela">
                <option disabled selected hidden>--- no ---</option>
                <option value="si"> si</option>
                <option value="no"> no</option>
            </select>
            <br><br>
            <label>fecha publicacion</label> <br>
            <input type="date" name="fecha">
            <?php if(isset($error_fecha)) echo "<span class='error'>$error_fecha</span>" ?>
            <br><br>
            <label>sinopsis</label> <br>
            <input type="text" name="sinopsis">
            <?php if(isset($error_sinopsis)) echo "<span class='error'>$error_sinopsis</span>" ?>
            <br><br>
            <input type="submit" value="enviar">
        </form>


        <?php
        if(isset($titulo) && isset($paginas) && isset($genero) && isset($sinopsis) && isset($fecha)) { ?>
            <h3><?php echo $titulo ?></h3>
            <h3><?php echo $paginas ?></h3>
            <h3><?php echo $genero ?></h3>
            <h3><?php echo $sinopsis ?></h3>
            <h3><?php echo $fecha ?></h3>

        <?php } ?>
</body>
</html>
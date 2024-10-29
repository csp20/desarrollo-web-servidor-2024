<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    require('../05_funciones/Validarform.php');
    ?>
</head>
<body>
    <?php
    function validarnombre($tmp_nombre){
    if ($tmp_nombre != '') {
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s'-]+$/", $tmp_nombre)) {
            //(filter_var ($tmp_nombre, FILTER_SANITIZE_STRING)
            //(!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s'-]+$/", $tmp_nombre))
             $error_nombre =  " el nombre no  debe tener caracteres raros";
        }else $nombre = $tmp_nombre;
    }else $error_nombre =  " el nombre es obligatorio ";
    }
    function validarapellido1($tmp_apellido1){
        if ($tmp_apellido1 != '') {
            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s'-]+$/", $error_apellido1)) {
                 $error_apellido1 =  " el apellido no  debe tener caracteres raros";
            }else $apellido1 = $tmp_apellido1;
        }else $error_apellido1 =  " el primer apellido  es obligatorio ";
    }
    function validarapellido2($tmp_apellido2){
        if ($tmp_apellido2 != '') {
            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s'-]+$/", $error_apellido2)) {
                $error_apellido2 =  " el apellido no  debe tener caracteres raros";
           }else $apellido2 = $tmp_apellido2;
        }else $error_apellido2 =  " el segundo apellido  es obligatorio ";
    }
    function validarDNI($tmp_DNI){
        if ($tmp_DNI != '') {
            if (!preg_match("/^[0-9]{8}[A-Za-z]$/", $tmp_DNI)) {
                $error_DNI =  " el  DNI  NO es correcto ";
            }
        
            // Extraer los 8 dígitos iniciales y la letra final
            $numero = substr($tmp_DNI, 0, 8);
            $letra = strtoupper(substr($tmp_DNI, -1)); //convierte la letra a mayuscula y coje la ultima letra
        
            // Tabla de letras de DNI según el módulo 23
            $letrasDNI = "TRWAGMYFPDXBNJZSQVHLCKE";
        
            // Calcula la letra esperada en función del número
            $letraEsperada = $letrasDNI[$numero % 23];
        
            // Compara la letra esperada con la letra dada en el DNI
            //$letra === $letraEsperada;
            if ($letra === $letraEsperada) {
                $DNI = $tmp_DNI;
                return $DNI; 
            }
            
        }else $error_DNI =  " el DNI  es obligatorio ";
    }
    function validarCorreo($tmp_correo){
        if ($tmp_correo != '') {
            if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $tmp_correo)) {
                //filter_var($correo, FILTER_VALIDATE_EMAIL)
                $error_correo =  " el correo no debe tener caracteres raros";
           }else $apellido2 = $tmp_correo;
        }else $error_correo =  " el correo es obligatorio ";
    }
    ?>
    
</body>
</html>
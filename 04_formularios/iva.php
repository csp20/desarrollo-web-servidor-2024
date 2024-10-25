<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    require('../05_funciones/irpf_fun.php');
    ?>
    <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
<!-- GENERAL = 21%
    REDUCIDO = 10%
     SUPERREDUCIDO 4% 
     10 IVA =GENERAL PVP 12,1
     10 IVA = REDUCID0 PVP 11
     -->
     

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tmp_precio = $_POST["precio"];
        if (isset($_POST["iva"])) $tmp_iva = $_POST["iva"]; 
        else $tmp_iva = "";
        
        if ($tmp_precio != '') {
            if (filter_var($tmp_precio,FILTER_VALIDATE_FLOAT) !== FALSE) {
                if ($tmp_precio>0) {
                    $precio = $tmp_precio;
                }else $error_precio = " el num debe ser mayor o igual que cero";
            }else $error_precio =  " el num debe ser un num";
        }else $error_precio =  " el num es obligatoria ";



        if ($tmp_iva == '') {
            $error_iva =  " el num es obligatoria";
        }else {
           $valores_validos_iva = ["general", "reducido", "superreducido"];
           if (!in_array($tmp_iva,$valores_validos_iva)) {
            $error_iva =  " el iva solo puede ser general reducido o superredus";
           }else  $iva = $tmp_iva;
        }   
    }
    
    ?>
   <form action="" method="post">
        <label for="precio">precio</label>
        <input type="text" name="precio" id="precio">
        <?php if (isset($error_precio)) echo "<span class='error'> $error_precio</span>"; ?>
        <br><br>
        <select name="iva">
            <option disabled selected hidden>--- Elige un tipo de IVA ---</option>
            <option value="general">general</option>
            <option value="reducido">reducido</option>
            <option value="superreducido">superreducido</option>
        </select>
        <?php if (isset($error_iva)) echo "<span class='error'> $error_iva</span>"; ?>
        <br><br>

        <input type="submit" value="Calcular">
     </form>
        <?php 
        if (isset($iva) and isset($precio)) {
            $hacienda = calcularIVA($precio,$iva);
            echo "<h3>$hacienda</h3>";
        }
        
        ?>
</body>
</html>
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

</head>
<body>
<!-- GENERAL = 21%
    REDUCIDO = 10%
     SUPERREDUCIDO 4% 
     10 IVA =GENERAL PVP 12,1
     10 IVA = REDUCID0 PVP 11
     -->
     <form action="" method="post">
        <label for="precio">precio</label>
        <input type="text" name="precio" id="precio">
        <br><br>
        <select name="iva">
            <option value="general">general</option>
            <option value="reducido">reducido</option>
            <option value="superreducido">superreducido</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
     </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tmp_precio = $_POST["precio"];
        $tmp_iva = $_POST["iva"];
       
        if ($precio != '' and $iva != '') {
            //vardump($precio);
           $pvp=  calcularIVA($precio,$iva);

            echo "<h3>el PVP es $pvp</h3>";
        }
        if ($tmp_precio != '') {
            if (filter_var($tmp_precio,FILTER_VALIDATE_FLOAT) !== FALSE) {
                if ($tmp_precio>0) {
                    $precio = $tmp_precio;
                }else {
                    echo "<p> el num debe ser mayor o igual que cero</p>";
                }
            }else {
                echo "<p> el num debe ser un num</p>";
            }
        }else {
            echo "<p> el num es obligatoria</p>";
        }
        if ($tmp_iva == '') {
            echo "<p> el num es obligatoria</p>";
        }else {
           $valores_validos_iva = ["general", "reducido", "superreducido"];
           if (!in_array($tmp_iva,$valores_validos_iva)) {
            echo "<p> el iva solo puede ser general reducido o superredus</p>";
           }else{
            $iva = $tmp_iva;
           }
        }


        if (isset($iva) and isset($precio)) {
            $hacienda = irpfcalc($num1);
            echo "<h3>$hacienda</h3>";
        }
        
    }
    
    ?>
   

</body>
</html>
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
<form action="" method="post"> 
        <label>IRPF</label>
        <input type="text" name="num1">
        <br><br>
        <input type="submit" value="enviar">
        

    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tmp_num1 = $_POST["num1"];
        
        if ($tmp_num1 != '') {
            if (filter_var($tmp_num1,FILTER_VALIDATE_FLOAT) !== FALSE) {
                if ($tmp_num1>0) {
                    $num1 = $tmp_num1;
                }else {
                    echo "<p> el num debe ser mayor o igual que cero</p>";
                }
            }else {
                echo "<p> el num debe ser un num</p>";
            }
        }else {
            echo "<p> el num es obligatoria</p>";
        }

        if (isset($num1)) {
            $hacienda = irpfcalc($num1);
            echo "<h3>$hacienda</h3>";
        }
    }

    ?>
        
        
</body>
</html>
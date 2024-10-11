<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
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
        $precio = $_POST["precio"];
        $iva = $_POST["iva"];
       
       $pvp=  match ($iva) {
          "general"   => $precio * 1.21,
          "reducido"  =>  $precio * 1.10,
          "superreducido" =>$precio * 1.04,
        };
        echo "<h3>el PVP es $pvp</h3>";
    }
    
    ?>
   

</body>
</html>
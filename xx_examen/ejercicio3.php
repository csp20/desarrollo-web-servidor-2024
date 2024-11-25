<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 3</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    ?>
</head>
<body>
        <form action="" method="post">
        <label for="introduce">introduce num</label>
        <input type="text" name="num" id="introduce">
        <br><br>
        <select name="cuenta">
            <option value="sumatorio">sumatorio</option>
            <option value="factorial">factorial</option>
            
        </select>
        <br><br>
        <input type="submit" value="Calcular">
     </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num = $_POST["num"];
        $cuenta = $_POST["cuenta"];
        $sum = 0;
        $fac =1;
        if ( $cuenta == "sumatorio") {
           for ($i=0; $i <= $num; $i++) { 
            $sum += $i ;
           }
           echo "<label> el sumatorio de $num es $sum </label>";
        }else{
            for ($i=1; $i <  $num+1; $i++) { 
                $fac *= $i ;
                
                if ($num==0) {
                    $fac =1;
                }
            }
            $fac= $fac+ $num;
            echo "<label> el factorial de $num es $fac </label>";
        }
    }
    
    ?>
   
</body>
</html>
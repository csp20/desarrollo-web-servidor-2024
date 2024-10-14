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
<form action="" method="post"> 
        <label>IRPF</label>
        <input type="text" name="num1">
        <br><br>
        <input type="submit" value="enviar">
        

    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"];
        $res =0;

       if ($num1 >0 && $num1<= 12450) {
        $res = $num1 -($num1 * 0.19);
       }elseif ($num1 >12450  && $num1<= 20199 ) {
        $res =$num1 -($num1 * 0.19);
        $res +=$num1 -($num1 * 0.24);
       }elseif ($num1 >20199  && $num1<= 35199 ) {
        $res =$num1 -($num1 * 0.19);
        $res +=$num1 -($num1 * 0.24);
        $res +=$num1 -($num1 * 0.30);
       }elseif ($num1 >35199 && $num1<= 59999 ) {
        $res =$num1 -($num1 * 0.19);
        $res +=$num1 -($num1 * 0.24);
        $res +=$num1 -($num1 * 0.30);
        $res +=$num1 -($num1 * 0.37);
       }elseif ($num1 >59999  && $num1<= 299999  ) {
        $res =$num1 -($num1 * 0.19);
        $res +=$num1 -($num1 * 0.24);
        $res +=$num1 -($num1 * 0.30);
        $res +=$num1 -($num1 * 0.37);
        $res +=$num1 -($num1 * 0.45);
       }elseif ($num1 >299999  && $num1< 300000  ) {
        $res =$num1 -($num1 * 0.19);
        $res +=$num1 -($num1 * 0.24);
        $res +=$num1 -($num1 * 0.30);
        $res +=$num1 -($num1 * 0.37);
        $res +=$num1 -($num1 * 0.45);
        $res +=($num1 * 0.47);
       }
       $hacienda = $num1-$res;
       echo "<h3>$hacienda</h3>";
    }

    ?>
        
        
</body>
</html>
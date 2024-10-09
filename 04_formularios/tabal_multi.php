<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--
    crear un form que reciba un num 
    se mostrara la tabla de mult de ese num en una tabla html
    2 x 1 = 2
    2 x 2 = 4

-->

<form action="" method="post">
        <p>nombre</p>
        <input type="text" name="num">
        <br>
        <!--<p>edad</p>
        <input type="text" name="edad">-->
        <input type="submit" value="enviar">  
    </form>
    <table border="1px">
        <thead>
            <tr>
                <th>num</th>
                <th>res</th>
            </tr>
        </thead>
        <tbody>
            
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // CODIGO Q  SE EJEVUTA CUANDO EL SERVER  recibe un post
    
    $num =$_POST["num"];
    //$nombre =$_POST["nombre"];

    for ($i=0; $i <=10; $i++) { 
        $res = $num * $i;
        echo "<tr>";
        echo "<td> $num X $i </td>";
        echo "<td> = $res</td>";
        echo "</tr>";
    }

    }
    ?>
            
        </tbody>
    </table>
</body>
</html>
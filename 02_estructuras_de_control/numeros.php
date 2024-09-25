<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $numero = 2;
    if($numero >0){
        echo "<p> el numero $numero es mayor que cero </p>";
    }
    if($numero >0) echo "<p> el numero $numero es mayor que cero </p>";



    if($numero >0){
        echo "<p> el numero $numero es mayor que cero </p>";
    }else {
        echo "<p> el numero $numero es menor que cero </p>";
    }
    if($numero >0) echo "<p> el numero $numero es mayor que cero </p>";
    else echo "<p> el numero $numero es menor que cero </p>";

    if($numero >0){
        echo "<p> el numero $numero es mayor que cero </p>";
    } elseif($numero ==0){
        echo "<p> el numero $numero es igual que cero </p>";
    }else {
        echo "<p> el numero $numero es menor que cero </p>";
    }

    if($numero >0) echo "<p> el numero $numero es mayor que cero </p>";
    elseif($numero ==0)  echo "<p> el numero $numero es igual que cero </p>";
    else echo "<p> el numero $numero es menor que cero </p>";


    ?>
    <?php
    #rangos [-10,0), [0,10], (10,20]

    $num =-7 ;
    # and o && pa conjuncion
    if($num >= -10  and $num < 0){
        echo "<p> el num $num esta en el rango [-10,0)</p>";
    }elseif($num>= 0 and $num <=10){
        echo "<p> el num $num esta en el rango [0,10]</p>";
    }elseif($num > 10 and $num <=20){
        echo "<p> el num $num esta en el rango [0,10]</p>";
    }else {
        echo "<p> el num $num esta fuer a de rango </p>";
    }

    if($num >= -10  and $num < 0)echo "<p> el num $num esta en el rango [-10,0)</p>";
    elseif($num>= 0 and $num <=10)echo "<p> el num $num esta en el rango [0,10]</p>";
    elseif($num > 10 and $num <=20)echo "<p> el num $num esta en el rango [0,10]</p>";
    else echo "<p> el num $num esta fuer a de rango </p>";
    



    ?>
    <!-- COMPROBR SI EL NUM ALEATORIO TIENE 1 2 O 3 DIGITOS-->
    <?php 
    
    $NUM_ALEATORIO = rand(1,200);
    //$NUM_ALEATORIO_decimal = rand(1,200)/10;
    
    if($NUM_ALEATORIO >= 1  AND $NUM_ALEATORIO < 10)echo "<p> el num aleatorio $NUM_ALEATORIO TIENE 1 DIGITO</p>";
    elseif($NUM_ALEATORIO>= 10 AND $NUM_ALEATORIO <100)echo "<p> el num aleatorio $NUM_ALEATORIO TIENE 2 DIGITOS</p>";
    else echo "<p> el num $NUM_ALEATORIO TIENE 3 DIGITOS </p>";
    
    $digitos =0;

    if($NUM_ALEATORIO >= 1  AND $NUM_ALEATORIO < 10){
        $digitos =1;
    }elseif($NUM_ALEATORIO>= 10 AND $NUM_ALEATORIO <100){
        $digitos =2;
    }else {
        $digitos =3;
    }
    $digitos_texto ="digito";
    if($digitos==1)

    echo "<p> el num $NUM_ALEATORIO TIENE $digitos $digitos_texto </p>";
    

    // num aleatorio decimales 


    $n = rand(1,3);
    switch ($n) {
        case 1:
            echo "el num es 1 ";
            break;
        case 2:
            echo "el num es 2";
            break;
        
        default:
            echo "el num es 3";
            
    }

    ?>




</body>
</html>
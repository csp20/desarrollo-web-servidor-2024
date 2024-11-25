<?php
function numABC($num1,$num2,$num3){
    for ($i=$num1; $i <$num2 ; $i++) { 
        if ($i % $num3 == 0) { // Verificar si i es múltiplo de c
            echo "<option >$i</option>";
        }else {
            echo "<option >no hay multiplos tio</option>";
        }
    }
    }


?>
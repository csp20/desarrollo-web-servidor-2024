<?php
function calcularIVA($precio,$iva){
    $pvp=  match ($iva) {
        "general"   => $precio * 1.21,
        "reducido"  =>  $precio * 1.10,
        "superreducido" =>$precio * 1.04,
    };
    return $pvp;
}



function irpfcalc($num1){
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

    $resultado = $num1-$res;
    return $resultado;
} 




?>
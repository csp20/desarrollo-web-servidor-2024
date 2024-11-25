<?php
function superpotencia($potencia, $base){
    $res = 1;
    for ($i=0; $i <$potencia ; $i++) { 
        $res = $res * $base;
        
    }
    return $res;
}
?>
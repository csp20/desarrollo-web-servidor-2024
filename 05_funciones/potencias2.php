<?php
function superpotencia($potencia, $base){
    $res = 1;
    for ($i=0; $i <$potencia ; $i++) { 
        $res = $res * $base;
        
    }
    if ($potencia ==0) $res == 1;
    echo "<h1>$res</h1>";
}
?>
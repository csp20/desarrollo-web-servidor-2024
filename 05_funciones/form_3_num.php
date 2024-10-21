<?php
function numMayor($num1,$num2,$num3){
$mayor= $num1;
if ($num2>$num1 && $num2>$num3) {
   $mayor=$num2;
   echo "<h3>$mayor</h3>";
}else if($num3>$num1 && $num3>$num2){
    $mayor=$num3;
   echo "<h3>$mayor</h3>";
}else {
    $mayor=$num1;
   echo "<h3>$mayor</h3>";
}
}
?>
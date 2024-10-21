<?php
function iva($precio, $iva){

if ($precio != '' and $iva != '') {
    //vardump($precio);
   $pvp=  match ($iva) {
      "general"   => $precio * 1.21,
      "reducido"  =>  $precio * 1.10,
      "superreducido" =>$precio * 1.04,
    };
    echo "<h3>el PVP es $pvp</h3>";
   }else {
    echo "<h3>te faltan datos primo  </h3>";
}
}
?>
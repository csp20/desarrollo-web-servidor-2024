<?php

function averiguaedad($nombre,$edad){

    if ($edad<18) echo "<h2>el nombre es $nombre y es menor</h2>";
    elseif ($edad>18 && $edad<65) echo "<h2>el nombre es $nombre y la edad es $edad</h2>";
    else echo "<h2>el nombre es $nombre y ta jubilao </h2>";
}
?>
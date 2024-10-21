<?php 
        function convertirTemperaturas($temperatura,$inicial,$final){
                $tipo = $inicial;
                $tipo2 = $final;

                $temperaturaInicial = $temperatura;
                $temperaturaFinal = $inicial;

    if ($tipo == "celsius" && $tipo2 == "fahrenheit") {
        $temperaturaFinal = $temperaturaInicial * 9 / 5 + 32;

    } elseif ($tipo == "celsius" && $tipo2 == "kelvin") {
        $temperaturaFinal = $temperaturaInicial + 273.15;

    } elseif ($tipo == "fahrenheit" && $tipo2 == "celsius") {
        $temperaturaFinal = ($temperaturaInicial - 32) * 5 / 9;

    } elseif ($tipo == "fahrenheit" && $tipo2 == "kelvin") {
        $temperaturaFinal = ($temperaturaInicial - 32) * 5 / 9 + 273.15;

    } elseif ($tipo == "kelvin" && $tipo2 == "celsius") {
       $temperaturaFinal = $temperaturaInicial - 273.15;

    } elseif ($tipo == "kelvin" && $tipo2 == "fahrenheit") {
        $temperaturaFinal = ($temperaturaInicial - 273.15) * 9 / 5 + 32;

    } elseif ($tipo == $tipo2) {
        $temperaturaFinal = $temperaturaInicial;
    }
    echo "<h3>La temperatura convertida es: $temperaturaFinal </h3>";
       


    }

    ?>
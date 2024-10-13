<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="post">
    <label for="temperatura">Introduce la temperatura:</label>
    <input type="text" name="temperatura" id="temperatura" required>
    <br><br>

    <label for="tipo">Convertir desde</label>
    <select name="tipo" id="tipo">
        <option value="celsius">Celsius</option>
        <option value="fahrenheit">Fahrenheit</option>
        <option value="kelvin">Kelvin</option>
    </select>
    <br><br>

    <label for="tipo2">Convertir a</label>
    <select name="tipo2" id="tipo2">
        <option value="celsius">Celsius</option>
        <option value="fahrenheit">Fahrenheit</option>
        <option value="kelvin">Kelvin</option>
    </select>
    <br><br>

    <input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temperatura = $_POST["temperatura"]; 
    $tipo = $_POST["tipo"];
    $tipo2 = $_POST["tipo2"];
    $gradosConvertidos = $temperatura;

    if ($tipo == "celsius" && $tipo2 == "fahrenheit") {
        $gradosConvertidos = $temperatura * 9 / 5 + 32;

    } elseif ($tipo == "celsius" && $tipo2 == "kelvin") {
        $gradosConvertidos = $temperatura + 273.15;

    } elseif ($tipo == "fahrenheit" && $tipo2 == "celsius") {
        $gradosConvertidos = ($temperatura - 32) * 5 / 9;

    } elseif ($tipo == "fahrenheit" && $tipo2 == "kelvin") {
        $gradosConvertidos = ($temperatura - 32) * 5 / 9 + 273.15;

    } elseif ($tipo == "kelvin" && $tipo2 == "celsius") {
        $gradosConvertidos = $temperatura - 273.15;

    } elseif ($tipo == "kelvin" && $tipo2 == "fahrenheit") {
        $gradosConvertidos = ($temperatura - 273.15) * 9 / 5 + 32;

    } elseif ($tipo == $tipo2) {
        $gradosConvertidos = $temperatura;
    }

    echo "<h3>La temperatura convertida es: $gradosConvertidos grados $tipo2</h3>";
}
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    ?>
</head>
<body>
        <!--EJERCICIO 4: Realiza un formulario que funcione a
        modo de conversor de temperaturas. Se introducirá en 
        un campo de texto la temperatura, y luego tendremos un 
        select para elegir las unidades de dicha temperatura,
        y otro select para elegir las unidades a las que queremos convertir la temperatura.
        Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT".
         Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.

        En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT.
          -->

          <form action="" method="post">
        <label for="temperatura">temperaturas</label>
        <input type="text" name="temperatura" id="temperatura">
        <br><br>
        <select name="tipo">
            <option value="celsius">celsius</option>
            <option value="fahrenheit">fahrenheit</option>
            <option value="kelvin">kelvin</option>
        </select>
        <br><br>
        <select name="tipo2">
            <option value="celsius">celsius</option>
            <option value="fahrenheit">fahrenheit</option>
            <option value="kelvin">kelvin</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
     </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);

    require('../05_funciones/temperaturas.php');
    require('../05_funciones/edades.php');
    ?>
</head>
<body>
    <h1>form temperatura</h1>
    <form action="" method="post">
        <label for="temperatura">temperaturas</label>
        <input type="text" name="temperatura" id="temperatura">
        <br><br>
        <select name="inicial">
            <option value="celsius">celsius</option>
            <option value="fahrenheit">fahrenheit</option>
            <option value="kelvin">kelvin</option>
        </select>
        <br><br>
        <select name="final">
            <option value="celsius">celsius</option>
            <option value="fahrenheit">fahrenheit</option>
            <option value="kelvin">kelvin</option>
        </select>
        <br><br>
        <input type="hidden" name="accion" value="formulario_temperaturas">
        <input type="submit" value="Calcular">
     </form>
     <br><br>

     <h1>form edades</h1>
     <form action="" method="post">
        <p>nombre</p>
        <input type="text" name="nombre">
        <br>
        <p>edad</p>
        <input type="text" name="edad"><br><br>
        <input type="hidden" name="accion" value="formulario_edades">
        <input type="submit" value="enviar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        /*se hace un if separado por cada formulario*/

        if ($_POST["accion"] == "formulario_temperaturas") {
            $temperatura = $_POST["temperatura"];
            $inicial = $_POST["inicial"];
            $final = $_POST["final"];

            convertirTemperaturas($temperatura,$inicial,$final);
        }
        if ($_POST["accion"] == "formulario_edades") {
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];

             averiguaedad($nombre,$edad);
        
        }
    }
        // en otro fichero, poner todos los demas formularios
        // y hacerlo con funciones
    ?>
</body>
</html>
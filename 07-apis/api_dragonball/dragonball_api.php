<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Personajes de Dragon Ball</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>

<form action="" method="get">
    <label for="cantidad">Cantidad de personajes:</label>
    <input type="text" id="cantidad" name="cantidad">
    <br><br>

    <label for="genero">Género:</label>
    <select id="genero" name="genero">
        <option value="female">Female</option>
        <option value="male">Male</option>
    </select>
    <br><br>

    <label for="race">Especie:</label>
    <select id="race" name="race">
        <option value="Human">Human</option>
        <option value="Saiyan">Saiyan</option>
        <option value="Namekian">namekian</option>
        <option value="Frieza Race">Frieza Race</option>
        <option value="Android"> Android</option>
    </select>
    <br><br>

    <button type="submit">Enviar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cantidad']) && isset($_GET['genero']) && isset($_GET['race'])) {
    $cantidad = $_GET['cantidad'];
    $genero = $_GET['genero'];
    $raza = $_GET['race'];
    //$origen = $_GET['origin'];

    $apiURL = "https://dragonball-api.com/api/characters?gender=$genero&race=$raza";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $personajes = array_slice($datos, 0, $cantidad);

    echo "<div id='resultados'>";
    foreach ($personajes as $personaje) {
        echo "<div>";
        echo "<h3>" . $personaje["name"] . "</h3>";
        echo "<p>Género: " . $personaje["gender"] . "</p>";
        echo "<p>Especie: " . $personaje["race"] . "</p>";
        //echo "<p>Origen: " . $personaje["origin"] . "</p>";
        echo "<img height='300px' weight='300px' src='" . $personaje["image"] . "' alt='" . $personaje["name"] . "'>";
        echo "</div><br>";
    }
    echo "</div>";
}
?>
</body>
</html>




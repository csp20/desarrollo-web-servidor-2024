<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Personajes de Rick y Morty</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad = $_POST['cantidad'];
    $genero = $_POST['genero'];
    $especie = $_POST['especie'];

    $apiURL = "https://rickandmortyapi.com/api/character/?gender=$genero&species=$especie";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $personajes = array_slice($datos["results"], 0, $cantidad);

    echo "<div id='resultados'>";
    foreach ($personajes as $personaje) {
        echo "<div>";
        echo "<h3>" . $personaje["name"] . "</h3>";
        echo "<p>Género: " . $personaje["gender"] . "</p>";
        echo "<p>Especie: " . $personaje["species"] . "</p>";
        echo "<p>Origen: " . $personaje["origin"]["name"] . "</p>";
        echo "<img src='" . $personaje["image"] . "' alt='" . $personaje["name"] . "'>";
        echo "</div><br>";
    }
    echo "</div>";
}
?>
</body>
</html>

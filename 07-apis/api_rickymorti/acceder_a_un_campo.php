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
<!-- codigo para acceder a un campo especifico -->
<?php
$apiURL = "https://rickandmortyapi.com/api/character";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $apiURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$respuesta = curl_exec($curl);
curl_close($curl);

$datos = json_decode($respuesta, true);
$personajes = $datos["results"];

echo "<div id='resultados'>";
foreach ($personajes as $personaje) {
    $nombre = $personaje["name"];
    $genero = $personaje["gender"];
    echo "<div>";
    echo "<h3>Nombre: $nombre</h3>";
    echo "<p>Género: $genero</p>";
    echo "</div><br>";
}
echo "</div>";
?>

</body>
</html>

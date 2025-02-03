<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>
<!-- Crea una página llamada perrito_raza.php que nos muestre un
perrito al azar de la raza escogida. La raza se escogerá mediante un campo
de tipo select. ¡Ten cuidado con la forma de mostrar las razas en el
desplegable, tiene truco!
 -->

 <?php
$apiURL = "https://dog.ceo/api/breeds/list/all";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $apiURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$respuesta = curl_exec($curl);
curl_close($curl);

$datos = json_decode($respuesta, true);
$razas = $datos["message"];
?> 

<form action="perrito_raza.php" method="post">
    <label for="perretes">perretes:</label>
    <select id="perretes" name="perretes">
        <?php 
        foreach ($razas as $raza => $subrazas) {
            if (empty($subrazas)) {
                echo "<option value='$raza'>$raza</option>";
            } else {
                foreach ($subrazas as $subraza) {
                    echo "<option value='$raza/$subraza'>$raza $subraza</option>";
                }
            }
        }
        ?>
    </select>
    <button type="submit">Pulsar para ver perrito</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $razaSeleccionada = $_POST['perretes'];
    $apiURL = "https://dog.ceo/api/breed/$razaSeleccionada/images/random";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $imagenPerrito = $datos["message"];

    echo "<img src='$imagenPerrito' alt='Perrito Aleatorio'>";
}
?>
</body>
</html>

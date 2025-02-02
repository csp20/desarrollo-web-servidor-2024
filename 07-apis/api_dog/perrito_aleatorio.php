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
<?php
$apiURL = "https://dog.ceo/api/breeds/image/random";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $apiURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$respuesta = curl_exec($curl);
curl_close($curl);

$datos = json_decode($respuesta, true);
$perritos = $datos["message"];
?> 
    <img src="<?php echo $perritos; ?>" alt="Perrito Aleatorio">
    <button><a href="perrito_aleatorio.php">Pulsar para ver perrito</a></button>
</body>
</html>
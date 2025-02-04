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
<!-- La API Shibe Online cuenta con una base de datos de fotos de
perros de la raza Shiba Inu. Vamos a crear un formulario que cuente con un
campo de selección donde se generen de manera dinámica los valores del 1
al 10 (es decir, en el código PHP sólo habrá un campo “option”, pero en el
HTML generado aparecerán diez). Cuando se envíe el formulario se mostrará
el número seleccionado de fotos de Shiba Inu.
Enlace a la API: https://shibe.online/
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
<form action="shiba_inu.php" method="get">
        <label for="cantidad">Cantidad de fotos:</label>
        <select id="cantidad" name="cantidad">
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        <button type="submit">Enviar</button>
    </form>
<?php
if ($_SERVER["REQUEST_METHOD"] =="GET" && isset($_GET["cantidad"])) {
    $cantidad = $_GET["cantidad"];
    $apiURL = "https://shibe.online/api/shibes?count=$cantidad";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiURL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $imagenes = json_decode($respuesta, true);
        echo "<div id='resultados'>";
        foreach ($imagenes as $imagen) {
            echo "<div>";
            echo "<img src='$imagen' alt='Shiba Inu'>";
            echo "</div><br>";
        }
        echo "</div>";
}
?>

</body>
</html>
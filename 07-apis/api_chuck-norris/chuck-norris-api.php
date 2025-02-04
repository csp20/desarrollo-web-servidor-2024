<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--  Crear un formulario que cuente con un campo de selección
donde se muestren todas las categorías de chistes sobre Chuck Norris,
extraídas en tiempo real desde la API REST. Cuando se envíe el formulario
se mostrará un chiste aleatorio de la categoría seleccionada.
Enlace a la API: https://api.chucknorris.io
 -->
 <?php
$apiURL = "https://api.chucknorris.io/jokes/categories";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $apiURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$respuesta = curl_exec($curl);
curl_close($curl);

$categorias = json_decode($respuesta, true);
?> 
    <form action="chuck-norris-api.php" method="GET">
    <label for="categoria">categoria de chistes:</label>
        <select id="categoria" name="categoria">
            <?php
            foreach ($categorias as $categoria ) {
                echo "<option value='$categoria'>$categoria</option>";
            }
            ?>
        </select>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['categoria'])) {
       $categoria= $_GET["categoria"];
       $apiURL = "https://api.chucknorris.io/jokes/random?category={$categoria}";

       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $apiURL);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $respuesta = curl_exec($curl);
       curl_close($curl);
       
       $datos = json_decode($respuesta, true);
       $chistes = $datos["value"];

        echo "<p>$chistes</p>";
    }
    ?>
</body>
</html>
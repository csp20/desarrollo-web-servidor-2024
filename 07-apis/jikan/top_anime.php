<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudios</title>
    <?php
 error_reporting( E_ALL );
 ini_set("display_errors", 1 );

    ?>
</head>
<body>
<!-- en top_anime.php
 mostrar en una tabla  el titulo not ae imagen-->
    <form action="" method="get">
        <label>ciudad:</label>
        <input type="text" name="ciudad">
        <input type="submit" value="Buscar">

    </form>
    <?php


    $apiURL = "https://api.jikan.moe/v4/top/anime";

    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos =json_decode($respuesta, true);
    $animnes = $datos["data"];

    ?>
    <ol>
        <?php
        foreach($animes as $anime){?>
        <li><?php echo $anime["title"]?></li>
    <?php } ?>
    </ol>
</body>
</html>

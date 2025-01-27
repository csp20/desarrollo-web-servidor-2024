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
 mostrar en una tabla  
 el titulo 
 la nota 
 la imagen-->
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
    $animes = $datos["data"];

    ?>
    <table>
        <thead>
            <tr>
                <th>posicion</th>
                <th>titulo</th>
                <th>nota</th>
                <th>imagen</th>
                <th>sinopsis</th>
                <th>generos</th>
            </tr>
        </thead>
        <tbody>
                <?php
                foreach($animes as $anime){?>
                <tr>
                    <td><?php echo $anime["rank"]?></td>
                    <td>
                        <a href="anime.php?id=<?php echo $anime["mal_id"]?>">
                            <?php echo $anime["title"]?></td>
                        </a>
                        
                    <td><?php echo $anime["score"]?></td>
                    <td>
                        <img width="90px" src="<?php echo $anime["images"]["jpg"]["image_url"]?>">
                    </td>
                    <td><?php echo $anime["synopsis"]?></td>
                    <td><?php echo $anime["genres"]["0"]["name"]?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>

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
 - radiobuttton con tres opciones:
 -- serie
 --pelicula
 -- todos
 
 por defecto saldran todos. si type =(cadena vacia), salen todos
 hacerlo TODO con metodo GET
 
 $tipo =$_GET["tipo"]
 "https://api.jikan.moe/v4/top/anime?type=$tipo;
 
 --------------------------------------------------------
 -abajo de la pagina dos botones o enlaces "anterior"
 y "siguiente"

 -si se con enlaces (a href), añadimos detras de la url ?page=$loquesea

 -al principio del codigo preguntamos cual es la pagina 
 que nos da la url, y la añadimos a la url de la api

 $page = $_GET["tipo"]
 "https://api.jikan.moe/v4/top/anime?page=$page;
 
 
 
 -->
   
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
    <h1>top anime</h1>
    <form action="top_anime.php" method="get">
        <?php foreach($animes as $anime){
            $anime["type"];
        }
        ?>
            <br>
            <br>
            <input type="radio" id="name" value="todos">todos</input>
            <br>
            <input type="radio" id="name" name="top_anime.php" value="TV"> series
            <!--<input type="radio" id="name" value="serie"  href="top_anime.php?id= <?php $anime["type"]["TV"]; ?>">serie</input>
            <br>-->
            <input type="radio" id="name" value="pelicula" <?php if ($anime["type"] == "Movie")echo  $anime["type"]["Movie"]; ?>>pelicula</input>
            <br><br>
            <button id="name" type="submit" value="Buscar">


            
                <!--<input type="radio" id="name" name="type" value="TV" ?php if ($anime["type"] == "TV") echo 'checked'; ?>> Serie
                <input type="radio" id="name" name="type" value="Movie" ?php if ($anime["type"] == "Movie") echo 'checked'; ?>> Película
                <br>
                <button type="submit">Enviar</button>-->


    </form>
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

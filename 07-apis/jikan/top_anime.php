<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudios</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
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

 $page = $_GET["page"]
 "https://api.jikan.moe/v4/top/anime?page=$page;
 -->
   
    <?php
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    $apiURL = "https://api.jikan.moe/v4/top/anime?type=$tipo&page=$page";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $animes = $datos["data"];
    ?> 

    <h1>Top Anime</h1>
    <form action="top_anime.php" method="get">
        <input type="radio" id="todos" name="tipo" value="" <?php if ($tipo == '') echo 'checked'; ?>> Todos<br>
        <input type="radio" id="serie" name="tipo" value="TV" <?php if ($tipo == 'TV') echo 'checked'; ?>> Serie<br>
        <input type="radio" id="pelicula" name="tipo" value="Movie" <?php if ($tipo == 'Movie') echo 'checked'; ?>> Película<br><br>
        <button type="submit">Buscar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Posición</th>
                <th>Título</th>
                <th>Nota</th>
                <th>Imagen</th>
                <th>Sinopsis</th>
                <th>Géneros</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($animes as $anime) { ?>
                <tr>
                    <td><?php echo $anime["rank"]; ?></td>
                    <td>
                        <a href="anime.php?id=<?php echo $anime["mal_id"]; ?>">
                            <?php echo $anime["title"]; ?>
                        </a>
                    </td>
                    <td><?php echo $anime["score"]; ?></td>
                    <td>
                        <img width="90px" src="<?php echo $anime["images"]["jpg"]["image_url"]; ?>">
                    </td>
                    <td><?php echo $anime["synopsis"]; ?></td>
                    <td>
                        <?php 
                        $generos = array_map(function($genre) {
                            return $genre["name"];
                        }, $anime["genres"]);
                        echo implode(", ", $generos);
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div>
        <a href="top_anime.php?tipo=<?php echo $tipo; ?>&page=<?php echo max(1, $page - 1); ?>">Anterior</a>
        <a href="top_anime.php?tipo=<?php echo $tipo; ?>&page=<?php echo $page + 1; ?>">Siguiente</a>
    </div>
</body>
</html>


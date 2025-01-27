<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
 error_reporting( E_ALL );
 ini_set("display_errors", 1 );

    ?>
</head>
<body>
    <!--mostrar 
    -titulo
    -nota
    -sinopsis
    -lista de generos
    trailer  -->
    <?php
    $id = $_GET["id"];
      $apiURL = "https://api.jikan.moe/v4/anime/$id/full";

    
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $apiURL);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $respuesta = curl_exec($curl);
      curl_close($curl);
  
      $datos =json_decode($respuesta, true);
      $anime = $datos["data"];
            //print_r($anime);
    ?>
    <h1><?php echo $anime["title"]?></h1>
    <h2><?php echo $anime["score"]?></h2>
    <img width="150px" src="<?php echo $anime["images"]["jpg"]["image_url"]?>">
   
    <div><?php echo $anime["synopsis"]?></div><br><br>
    <h3>generos</h3>
    <ul> 
        <?php foreach ($anime["genres"] as $genero) { ?>
        <li><?php echo $genero["name"]?></li>
        <?php } ?>
    </ul>
    
        <br>
        <iframe  src="<?php echo $anime["trailer"]["embed_url"]?>"></iframe>
    
    <ul>
        <h3>animes relacionados</h3>
    <?php foreach ($anime["relations"] as $relacionado) { 
            foreach($relacionado["entry"] as $entrada){
                if ($entrada["type"] == "anime") {?>
                   <li>
                        <a href="anime.php?id=<?php echo $entrada["mal_id"]?>">
                        <?php echo $entrada["name"] ?>
                        </a>
                   </li>
                <?php }
            }
        ?>
        <?php } ?>
    </ul>
        <!--AHORA VAMOS A:
        Añadir a los animes una lista con los productores de la serie.
         Los productores son las empresas encargadas en producir el anime.

        Una vez hecha la lista, mostraremos en un archivo productor.php 
        el nombre por defecto del productor, su imagen y 
        la información sobre el productor que nos provee la api (about) -->
</body>
</html>
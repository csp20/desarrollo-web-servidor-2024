<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemons</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
    $apiURL = "https://pokeapi.co/api/v2/pokemon/?limit=5";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);
    
    $datos = json_decode($respuesta, true);
    $pokemons = $datos["results"];
    ?>
    <table>
        <thead>
            <tr>
                <th>pokemon</th>
                <th>imagen</th>
                <th>tipos</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
            foreach ($pokemons as $pokemon) {
                $pokemon_url = $pokemon["url"];
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $pokemon_url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                curl_close($curl);

                $pokemon_info = json_decode($respuesta, true);
                $pokemon_name = ucfirst($pokemon["name"]);
                $pokemon_image = $pokemon_info["sprites"]["front_default"];
                
               
        ?>
                <td> <?php echo $pokemon_name; ?>  </td>
            <td><img src="<?php echo $pokemon_image; ?>" alt="<?php echo $pokemon_name; ?>"> </td>
            <td></td>
            </tr>
        </tbody>
    </table>

        
                  
        <?php
            }
        ?>
</body>
</html>

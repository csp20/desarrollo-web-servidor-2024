<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Personajes de Rick y Morty</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>
    <form action="resultados_personajes.php" method="post">
        <label for="cantidad">Cantidad de personajes:</label>
        <input type="text" id="cantidad" name="cantidad">
        <br><br>

        <label for="genero">Género:</label>
        <select id="genero" name="genero">
            <option value="female">Female</option>
            <option value="male">Male</option>
        </select>
        <br><br>

        <label for="especie">Especie:</label>
        <select id="especie" name="especie">
            <option value="human">Human</option>
            <option value="alien">Alien</option>
        </select>
        <br><br>

        <button type="submit">Enviar</button>
    </form>

    <div id="resultados"></div>
</body>
</html>

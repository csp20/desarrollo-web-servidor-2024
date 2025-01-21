<?php
    error_reporting( E_ALL );
    ini_set("display_errors", 1 );

    header("Content-Type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];
    $entrada = json_decode(file_get_contents('php://input'), true);
    /**
     * $entrada["numero"] -> <input name="numero">
     *
    *AÑADIR AL GET DE ANIMES LA POSIBILIDAD DE FILTRAR POR:
    * estudio
    * rango del anno_estreno. Si no se ponen los dos rangos (desde y hasta), no se filtra por el año de estreno
    *AÑADIR AL GET DE ANIMES LA POSIBILIDAD DE FILTRAR POR:
    *estudio
    * rango del anno_estreno. Si no se ponen los dos rangos (desde y hasta), no se filtra por el año de estreno

    * api_animes.php?nombre_estudio=OML
    * api_animes.php?desde=2000&hasta=2010
    * api_animes.php?desde=2000&hasta=2010&nombre_estudio=Diomedéa
 
     *
     */

    switch($metodo) {
        case "GET":
            manejarGet($_conexion);
            break;
        case "POST":
            manejarPost($_conexion, $entrada);
            break;
        case "PUT":
            manejarPut($_conexion, $entrada);
            break;
        case "DELETE":
            echo json_encode(["metodo" => "delete"]);
            break;
        default:
            echo json_encode(["metodo" => "otro"]);
            break;
    }

    function manejarGet($_conexion) {
        if (isset($_GET["desde"])&& isset($_GET["hasta"]) && isset($_GET["nombre_estudio"])) {
            $sql = "SELECT * FROM animes WHERE anno_estreno BETWEEN :desde AND :hasta AND nombre_estudio";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "desde" => $_GET["desde"],
                "hasta" => $_GET["hasta"],
                "nombre_estudio" => $_GET["nombre_estudio"]
            ]);
        }elseif (isset($_GET["desde"])&& isset($_GET["hasta"])) {
            $sql = "SELECT * FROM animes WHERE anno_estreno BETWEEN :desde AND :hasta";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "desde" => $_GET["desde"],
                "hasta" => $_GET["hasta"]
            ]);
        }elseif (isset($_GET["nombre_estudio"])) {
            $sql = "SELECT * FROM animes WHERE nombre_estudio = :nombre_estudio";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "nombre_estudio" => $_GET["nombre_estudio"]
            ]);
        }else{
            $sql = "SELECT * FROM animes";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute();
        }
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);   # Equivalente al getResult de mysqli
        echo json_encode($resultado);
    }

    function manejarPost($_conexion, $entrada) {
        $sql = "INSERT INTO animes (id_anime, titulo, nombre_estudio, anno_estreno, num_temporadas)
            VALUES (:id_anime, :titulo, :nombre_estudio, :anno_estreno, :num_temporadas)";

        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "id_anime" => $entrada["id_anime"],
            "titulo" => $entrada["titulo"],
            "nombre_estudio" => $entrada["nombre_estudio"],
            "anno_estreno" => $entrada["anno_estreno"],
            "num_temporadas" => $entrada["num_temporadas"]
        ]);
        if($stmt) {
            echo json_encode(["mensaje" => "el anime se ha insertado correctamente"]);
        } else {
            echo json_encode(["mensaje" => "error al insertar el estudio"]);
        }
    }
    function  manejarPut($_conexion, $entrada){
        $sql = "UPDATE  animes SET 
            titulo = :titulo,
            nombre_estudio = :nombre_estudio,
            anno_estreno = :anno_estreno,
            num_temporadas = :num_temporadas 
            WHERE id_anime = :id_anime";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([ 
            "titulo" => $entrada["titulo"],
            "nombre_estudio" => $entrada["nombre_estudio"],
            "anno_estreno" => $entrada["anno_estreno"],
            "num_temporadas" => $entrada["num_temporadas"],
            "id_anime" => $entrada["id_anime"]
    ]);
        if ($stmt) {
            echo json_encode(["mensaje" => "el anime se ha actualizado correctamente"]);
        }else {
            echo json_encode(["mensaje" => "ERROR, el anime  NO se ha actualizado"]);
        }
    }
?>
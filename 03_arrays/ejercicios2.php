<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL);
    ini_set ("display_errors", 1);
    ?>
</head>
<body>
    
    <!-- EJ 1)
        array num pares 1-50, mostrar num descendentes-->
    <?php
    $array = [];
    for ($i=1; $i <=50 ; $i++) { 
        if ($i%2==0) {
           //array_push($array, $array[$i]);
           $array[$i] = $i;
           //echo "<li>". $array[$i] . "</li>";
        }
    }
        arsort($array);
        print_r($array);
    ?>
    <!-- EJ 2)
        Genera 10 números aleatorios entre el 0 y el 100.
        Almacénalos en un array y muéstralos ordenados de mayor a
        menor y de menor a mayor.
        Mostrar en total 3 listas: una con el array inicial y dos
        con el array ordenado de ambas maneras.-->
        <?php
        
        $array = [];
        for ($i=0; $i <=10 ; $i++) { 
            $array[$i] = rand(0,100);
            
        }
        echo "<h3> lista 1 </h3>";
        print_r($array);

        echo "<h3> lista 2 </h3>";
        arsort($array);
        print_r($array);

        echo "<h3> lista 3 </h3>";
        asort($array);
        print_r($array);


    ?>
    <!-- EJ 3) Dada la lista de países y sus capitales mostrada en la
         siguiente página, muéstralos en una tabla ordenados por los
         nombres de sus países.-->
    <?php
        $paises = array (
            "Italy"=>"Rome", 
            "Luxembourg" =>"Luxembourg" , 
            "Belgium"=>"Brussels" ,
            "Denmark"=>"Copenhagen" ,
            "Finland"=>"Helsinki" , 
            "France" =>"Paris", 
            "Slovakia" =>"Bratislava" ,
            "Slovenia" =>"Ljubljana" ,
            "Germany" =>"Berlin", 
            "Greece" => "Athens",
            "Ireland"=>"Dublin",
            "Netherlands" =>"Amsterdam",
            "Portugal" =>"Lisbon",
            "Spain"=>"Madrid",
            "Sweden"=>"Stockholm" ,
            "United Kingdom" =>"London",
            "Cyprus"=>"Nicosia",
            "Lithuania" =>"Vilnius", 
            "Czech Republic" =>"Prague",
            "Estonia"=>"Tallin",
            "Hungary"=>"Budapest",
            "Latvia"=>"Riga", 
            "Malta"=>"Valetta",
            "Austria" =>"Vienna", 
            "Poland"=>"Warsaw",
        );
        ksort($paises);
     ?>
     
     <table border="1px">
        <caption>tabla orden paises</caption>
        <thead>
            <tr>
                <th> pais</th>
                <th>capital</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($paises as $pais => $capital){
                echo"<tr>";
                echo "<td>$pais</td>";
                echo "<td>$capital</td>";
                echo"</tr>";
            }
            ?>
        </tbody>
            
     </table>
</body>
</html>
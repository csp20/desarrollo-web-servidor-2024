<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- <h1>marcas </h1>
    <ol>
        foreach($marcas as $marca)
              <li>{marca}}</li>
        ndforeach
    </ol> -->
    <h1>lista coches</h1>
    <table>
        <thead>
            <tr>
                <th>marca</th>
                <th>año de fundacion </th>
                <th>pais</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marcas as $marca)
            <tr>
                <td>{{$marca -> marca}}</td>
                <td>{{$marca -> ano_fundacion}}</td>
                <td>{{$marca -> pais}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
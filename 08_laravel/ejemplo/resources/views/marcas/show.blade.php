<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Marca</h1>
    <h2>marca: {{ $marca -> marca }}</h2>
    <td>
        <a href= "{{route('marcas.show', ["marca"=> $marca -> id])}}">editar </a>
    </td>
    <td>
        <a href= "{{route('marcas.index')}}">volver </a>
    </td>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('marcas.store')}}" method="post">
        @csrf 
        <label>Marca:</label>
        <input type="text" name= "marca" value="{{$marca -> marca}}"><br><br>
        <label>año fundacion:</label>
        <input type="number" name= "ano_fundacion" value="{{$marca -> ano_fundacion}}"><br><br>
        <label>País:</label>
        <input type="text" name= "pais" value="{{$marca -> pais}}"><br><br>
        <input type="submit" value="Crear">

    </form>
</body>
</html>
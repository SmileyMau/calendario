<!DOCTYPE html>
<html>
<head>
    <title>Recordatorio</title>
</head>
<body>
    <h1>Hola, {{ $evento->name }} {{ $evento->last_name }}!</h1>
    <b>{{ $evento->titulo }}</b>
    <p>{{ $evento->descripcion }}</p>
</body>
</html>
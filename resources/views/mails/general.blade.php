<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Soporte general ixtus</title>
</head>
<body>

    <ul>
        <li>De: {{ Auth::User()->name }}</li>
        <li>Teléfono: {{ Auth::User()->telefono }}</li>
        <li>Email: {{ Auth::User()->email }}</li>
    </ul>
    <p>Soporte General:</p>
    <ul>
        <li>Asunto: {{ $request->asunto }}</li>
        <li>Mensaje: {{ $request->mensaje }}</li>
    </ul>
</body>
</html>

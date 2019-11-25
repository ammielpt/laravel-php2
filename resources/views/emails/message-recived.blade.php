<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mensaje recibido</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    Contenido del email
<p>Recibiste un mensaje de: {{$msg['name']}} - {{$msg['email']}}</p>
<p><strong>Asunto:</strong>{{$msg['subject']}}</p>
<p><strong>Contenido:</strong>{{$msg['content']}}</p>
</body>
</html>
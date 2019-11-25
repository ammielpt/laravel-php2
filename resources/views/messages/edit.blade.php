<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Editar Mensaje</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <form method="post" action="{{route('messages.update',$message->id)}}">
        @csrf
        {!!method_field('PUT')!!}
        <label for="nombre">Nombre
            <input type="text" name="nombre" value="{{$message->nombre}}">
            {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
        </label><br /><br />
        <label for="email">Email
            <input type="text" name="email" value="{{$message->email}}">
            {!!$errors->first('email', '<span class=error>:message</span>')!!}
        </label><br /><br />
        <label for="mensaje">Mensaje
            <textarea name="mensaje">{{$message->mensaje}}</textarea>
            {!!$errors->first('mensaje', '<span class=error>:message</span>')!!}
        </label><br /><br />
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
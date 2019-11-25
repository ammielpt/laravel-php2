<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <h1>Todos los mensajes</h1>
    <table width="100%" border="1">
        <thead border="1">
            <tr>ID</tr>
            <tr>Nombre</tr>
            <tr>Email</tr>
            <tr>Mensaje</tr>
            <tr>Acciones</tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
            <tr>
                <td>{{$message->id}}</td>
                <td><a href="{{route('messages.show',$message->id)}}">{{$message->nombre}}</a></td>
                <td>{{$message->email}}</td>
                <td>{{$message->mensaje}}</td>
                <td><a href="{{route('messages.edit', $message->id)}}">Editar</a>
                    <form style="display: inline;" action="{{route('messages.destroy', $message->id)}}" method="POST">
                        {!!method_field('DELETE')!!}
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
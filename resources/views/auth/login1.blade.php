<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
<header>        
        <nav>
            <a class="{{request()->is('saludo')? 'active':''}}" href="{{route('saludo')}}">Inicio</a>
            <a class="{{request()->is('saludo/*')? 'active':''}}" href="{{route('saludo', 'Jorge')}}">Saludo</a>
            <a class="{{request()->is('contactanos')? 'active':''}}" href="{{route('messages.create')}}">Contacto</a>
            @if(auth()->check())
            <a class="{{request()->is('mensajes')? 'active':''}}" href="{{route('messages.index')}}">Mensajes</a>
            @endif
            @if(auth()->check())
            <a href="/logout">Cerrar sesion de {{auth()->user()->name}}</a>
            @endif
            @if(auth()->guest())
            <a class="{{request()->is('login')? 'active':''}}" href="/login">Login</a>
            @endif
        </nav>
    </header>
    <br><br>
    <h1>Login</h1> 
    <form method="post" action="/login">
    {!!csrf_field()!!}
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Entrar">
    </form>
</body>

</html>
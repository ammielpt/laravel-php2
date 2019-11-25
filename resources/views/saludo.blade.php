<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>@yield('title','Aprendible')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>   
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <script src='/js/app.js'></script>
    <script src='main.js'></script>
</head>

<body>
    
    <nav>
        <a class="{{request()->is('saludo')? 'active':''}}" href="{{route('saludo')}}">Inicio</a>
        <a class="{{request()->is('saludo/*')? 'active':''}}" href="{{route('saludo', 'Jorge')}}">Saludo</a>
        <a class="{{request()->is('contactanos')? 'active':''}}" href="{{route('messages.create')}}">Contacto</a>
        <a class="{{request()->is('mensajes')? 'active':''}}" href="{{route('messages.index')}}">Mensajes</a>
        @if(auth()->check())
        <a href="/logout">Cerrar sesion de {{auth()->user()->name}}</a>
        @endif
        @if(auth()->guest())
        <a class="{{request()->is('login')? 'active':''}}" href="/login">Login</a>
        <button onclick="eventoclick()">Dar click</button>
        @endif
    </nav>
    Hola: {{$nombre}}
    {!! $html !!}
    {!!$script!!}
    <ul>
        <!--@foreach($consolas as $consola)
        <li>{{$consola}}</li>
        @endforeach-->
        @forelse($consolas as $consola)
        <li>{{$consola}}</li>
        @empty
        <li>No hay consolas :(</li>
        @endforelse
    </ul>
    @if(count($consolas)===1)
    <p>Solo tienes una consola</p>
    @elseif(count($consolas)>1)
    <p>Tienes varias consolas</p>
    @else
    <p>No tienes ninguna consola</p>
    @endif

    @if(session()->has('info'))
    <p>{{session('info')}}</p>
    @endif
    <header>
        <h1>{{request()->url()}}</h1>
        <h1>{{request()->is('/')? 'Estas en el home': 'No estas en el home'}}</h1>
    </header>
</body>

</html>
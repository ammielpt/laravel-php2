@extends('layout')

@section('title', 'Home')

@section('content')
<h1>Home</h1>
@endsection

Bienvenido {{$nombre??'Invitado'}}
@auth
{{auth()->user()->name}}
@endauth
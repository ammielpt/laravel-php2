@extends('layout')

@section('title', 'Crear proyecto')

@section('content')
<h1>Editar proyecto</h1>

@include('partials.session-status')

@include('partials.validation-errors')

{{$project}}
<form method="POST" action="{{route('projects.update',$project)}}">
    @method('PATCH')

    @include('projects._form',['btnText'=>'Actualizar'])

</form>
@endsection

@extends('layout')

@section('content')
<h1>Portafolio</h1>

@auth
<a href="{{route('projects.create')}}">Crear Proyecto</a>
@endauth

@include('partials.session-status')

<ul>
    @forelse($projects as $project)
    <li><a href="{{route('projects.show',$project)}}">{{$project->title}}</a><br/><small>{{$project->description}}</small> - <small>{{$project->updated_at->diffForHumans()}}</small></li>
    @empty
    <h1>No hay proyectos para mostrar</h1>
    @endforelse
    
</ul>
@endsection
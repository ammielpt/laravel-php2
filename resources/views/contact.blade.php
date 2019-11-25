@extends('layout')

@section('content')

<h1>{{__('Contact')}}</h1>

@if($errors->any())
    @foreach($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
@endif

@include('partials.session-status')

<pre>{{route('contact')}}</pre>
<form method="POST" action="{{route('messages.store')}}">
    @csrf
    <input type="text" name="name" placeholder="Nombre..." value="{{old('name')}}"><br/>
    {!!$errors->first('name', '<small>:message</small><br/>')!!}
    <input type="email" name="email" placeholder="Email..." value="{{old('email')}}"><br/>
    {{$errors->first('email')}}<br/>
    <input type="text" name="subject" placeholder="Asunto..." value="{{old('subject')}}"><br/>
    <textarea name="content" placeholder="Mensaje..." value="{{old('content')}}"></textarea><br/>
    <button>@lang('Send')</button>
</form>
@endsection
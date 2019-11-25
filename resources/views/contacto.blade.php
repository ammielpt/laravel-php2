<h1>{{__('Contact')}}</h1>
<h2>Escribeme</h2>
<link href="/css/app.css">
<script src="/js/app.js" type=""></script>
<style>
    .error{
        color:red;
    }
</style>
<form method="post" action="contactame-mio">
    @csrf
    <label for="nombre">Nombre
        <input type="text" class="form-control"  name="nombre" value="{{old('nombre')}}"> 
        {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
    </label><br/><br/>
    <label for="email">Email
        <input type="text" class="form-control"  name="email">
        {!!$errors->first('email', '<span class=error>:message</span>')!!}
    </label><br/><br/>
    <label for="mensaje">Mensaje
        <textarea name="mensaje" class="form-control" ></textarea>
        {!!$errors->first('mensaje', '<span class=error>:message</span>')!!}
    </label><br/><br/>
    <input type="submit" class="btn primary" lue="Enviar">
</form>
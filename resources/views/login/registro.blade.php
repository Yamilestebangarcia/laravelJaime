@extends('login.plantilla')
@section('titulo')
    registrate
@endsection
@section('contenido')
<form action="{{route("registroPost")}}" method="POST">
    @csrf
    <input type="text" placeholder="email" name="email" value="{{old("email")}}">
    @error('email')
        <p>{{$message}}</p>
    @enderror


    <button type="submit">registrarse</button> 
</form>
@if (session("info"))
<<<<<<< HEAD
<p>{{session("info")}} </p>
=======

<p>{{session("info")}} </p>

>>>>>>> yamil/main
@endif
@endsection 
@extends('login.plantilla')
@section('titulo')
    login
@endsection
@section('contenido')
<form action="{{route("loginPost")}}" method="POST">
    @csrf
    <input type="email" placeholder="email" name="email" value="{{old("email")}}">
    @error('email')
        <p>{{$message}}</p>
    @enderror


    <button type="submit">login</button> 
</form>
@if (session("info"))
<p>{{session("info")}} </p>
@endif
@endsection 
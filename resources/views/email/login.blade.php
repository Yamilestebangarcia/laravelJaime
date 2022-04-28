@extends('email.plantilla')
@section('titulo')
    login
@endsection
@section('contenido')
<h1>logeate</h1>

 <p><a href="{{route("loginJwt",$jwt)}}">login</a> </p> 
{{-- ." --}}
 <p>si no no puede entrar por el enlace copia esto:</p>
 {{-- <p>{{route("loginJwt",$jwt)}}</p> --}}
@endsection
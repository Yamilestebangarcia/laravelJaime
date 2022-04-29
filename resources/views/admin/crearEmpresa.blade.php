@extends('admin.plantilla')
@section('titulo')
    crear empresa
@endsection
@section('contenido')
    <h1>Crear empresa</h1>
    <form action="{{route("crearEmpresaPost")}}" method="POST">
        @csrf
        <input placeholder="nombre" name="nombre" value="{{old("nombre")}}"/>
        @error('nombre')
        <p>{{$message}}</p>
        @enderror
        <input placeholder="email" name="email" value="{{old("email")}}"/>
        @error('email')
        <p>{{$message}}</p>
        @enderror
        <button type="submit">crear</button>
    </form>

@endsection
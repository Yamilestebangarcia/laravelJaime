@extends('layouts.plantilla')
@section('titulo')
    datos de la empresa
@endsection
@section('contenido')
    formulario datos empresa
    @if (session("info"))
<p>{{session("info")}} </p>
@endif
@endsection
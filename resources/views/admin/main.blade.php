@extends('layouts.plantilla')
@section('titulo')
    main
@endsection
@section('contenido')
    main admin
    @if (session("info"))
    <p>{{session("info")}} </p>
    @endif
@endsection

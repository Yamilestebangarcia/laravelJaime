@extends('empresa.plantilla')
@section('titulo')
    datos de la empresa
@endsection
@section('contenido')

@if ($user->count() > 0)
<form action="{{route("UpdateDatosRegistro")}}" method="post">
@else
<form action="{{route("dataRegisterPost")}}" method="post">
@endif  

        @csrf
        @if ($user->count() > 0)
         <input type="text" placeholder="CIF" name="cif" value="{{$user[0]->cif}}">
         @else
         <input type="text" placeholder="CIF" name="cif" value="{{old("cif")}}">
         @endif  
       
        @error('cif')
        <p>{{$message}}</p>
    @enderror
    @if ($user->count() > 0)
    <input type="text" placeholder="Nombre" name="nombre" value="{{$user[0]->nombreComercial}}" >
    @else
    <input type="text" placeholder="Nombre" name="nombre" value="{{old("nombre")}}" >
    @endif
        @error('nombre')
        <p>{{$message}}</p>
    @enderror
    <select name="tipo">
    @if ($user->count() > 0)
    <option value="{{$user[0]->tipo}}">{{$user[0]->tipo}}</option>
     @if($user[0]->tipo==="publico")
        <option value="privado">Privado</option>
     @else
      <option value="publico">Publico</option>
     @endif
    @else 
    <option value="publico">Publico</option>
    <option value="privado">Privado</option>
    @endif
    </select>
    @error('tipo')
    <p>{{$message}}</p>
@enderror

@if ($user->count() > 0)
<input type="text" placeholder="Telefono" name="telefono" value="{{$user[0]->telefono}}">
@else
<input type="text" placeholder="Telefono" name="telefono" value="{{old("telefono")}}">
@endif
       
        @error('telefono')
        <p>{{$message}}</p>
    @enderror
    @if ($user->count() > 0)
    <input type="text" placeholder="Web" name="web" value="{{$user[0]->web}}"/>
    @else
    <input type="text" placeholder="Web" name="web" value="{{old("web")}}"/>
    @endif
   
        @error('web')
        <p>{{$message}}</p>
    @enderror

    @if ($user->count() > 0)
    <input type="text"  placeholder="Actividad" name="actividad" value="{{$user[0]->actividad}}">
    @else
     <input type="text"  placeholder="Actividad" name="actividad" value="{{old("actividad")}}">
    @endif
        @error('actividad')
        <p>{{$message}}</p>
    @enderror

    @if ($user->count() > 0)
    <input type="text" placeholder="Horario" name="horario" value="{{$user[0]->horario}}" >
    @else
    <input type="text" placeholder="Horario" name="horario" value="{{old("horario")}}" >
    @endif
   
        @error('horario')
        <p>{{$message}}</p>
    @enderror
    @if ($user->count() > 0)
    {{{$user[0]->observaciones}}}
    <textarea name="observaciones" placeholder="Observaciones" >{{$user[0]->observaciones}}</textarea>
    @else
    <textarea name="observaciones" placeholder="Observaciones">{{old("observaciones")}}</textarea>
    @endif
       
        @error('observaciones')
        <p>{{$message}}</p>
    @enderror
        <button type="submit">Guardar</button>
    </form>
    @if (session("info"))
<p>{{session("info")}} </p>
@endif 
@endsection
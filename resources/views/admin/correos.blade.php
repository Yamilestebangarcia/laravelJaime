@extends('admin.plantilla')

@section('titulo')
    enviar correos
@endsection
@section('contenido')
   <h1>enviar correos</h1> 
{{--    @foreach ($arrayEmails as $correo)
       {{$correo}}
   @endforeach --}}
   @php 
   $value="";
   for($i = 0; $i < count($arrayEmails); ++$i) {
       if($i===0){
        
        $value=  $arrayEmails[$i];
       }else {
        $value= $value.",". $arrayEmails[$i];
       }
  
   } @endphp
    
    
<form action="{{Route("enviarEmail")}}" method="POST">
    @csrf
    <select id="platilla">
        <option value="0"> Eligir plantilla</option>
        <option value="1"> plantilla 1</option>
        <option value="2"> plantilla 2</option>
        <option value="3"> plantilla 3</option>
    </select>
    <label for="email" > Direcciones de correo </label>
       <input type="text" name="email" value="{{$value}}" id="email">
       <label for="asunto" > Asunto </label>
       <input type="text" name="asunto" id="asunto">
       <label for="cuerpo" > Cuerpo email </label>
       <textarea name="cuerpo" id="cuerpo" cols="30" rows="10"></textarea>
       <button type="submit">enviar</button>
   </form> 
   <script src="{{asset('js/emailPlantila.js')}}"></script>
   @endsection
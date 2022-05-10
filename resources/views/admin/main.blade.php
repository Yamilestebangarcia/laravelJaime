@extends('layouts.plantilla')
@section('titulo')
    Administración
@endsection
@section('contenido')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>

    <body>
        <h1>Página del Administrador</h1>
        <button>Crear empresa</button>
        <br>
        <br>
        @foreach ($empresas as $empresa)
            $empresa->CIF;
        @endforeach
        {{-- FILTROS PARA LA TABLA --}}
        {{-- Primer filtro para tabla --}}
        <select name="filtro1" id="filtro1">
            {{-- Aquí hay que generar options según filtro --}}
            <option value="filtro1">Filtro1</option>
            <option value="filtro2">Filtro2</option>
        </select>
        {{-- Segundo filtro para tabla --}}
        <select name="filtro2" id="filtro2">
            {{-- Aquí hay que generar options según filtro --}}
            <option value="filtro1">Filtro1</option>
            <option value="filtro2">Filtro2</option>
        </select>
        {{-- Se todos los filtros que el cliente quiera (o pueda) --}}

        {{-- TABLA DE EMPRESAS --}}
        <table>
            <tbody>
                {{-- Esto hay que generarlo dinámicamente --}}
                <tr>
                    <td>campo</td>
                    <td>campo</td>
                    <td>campo</td>
                    <td>campo</td>
                    <td><input type="checkbox"></td>
                </tr>
                {{-- Esto hay que generarlo dinámicamente --}}
                <tr>
                    <td>campo</td>
                    <td>campo</td>
                    <td>campo</td>
                    <td>campo</td>
                    <td><input type="checkbox"></td>

                </tr>
            </tbody>
        </table>
        {{-- BOTONERÍA --}}
        <button>Autorizar seleccionados</button>
        <button>Correo a los seleccionados</button>
        <button>Eliminar seleccionados</button>
    </body>

    </html>
    @if (session('info'))
        <p>{{ session('info') }} </p>
    @endif
@endsection

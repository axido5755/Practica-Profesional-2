@extends('layouts.master')


@section('content')

    <div class="container-fluid">
        <div class="container">


            <h1>Lista de tutoria a editar: {{$Lista_Tutorias->Nombre_Lenguaje}}</h1>
           
                        
            <form class="form-group" method="POST" action="/Lista_Tutorias/store2/{{$Lista_Tutorias->ID_Lista_Tutorias}}">
                @method('PUT')
                @csrf

                {{-- Lenguaje de tutoria --}}
                <div class="form-group">
                    <label>Lenguaje de tutoria:</label>
                    <input type="text" class="form-control" name='Nombre_Lenguaje' maxlength="100" minlength="0" value="{{$Lista_Tutorias->Nombre_Lenguaje}}" required>
                </div>

                {{-- Descripcion --}}
                <div class="form-group">
                    <label>Descripcion:</label>
                    <input type="text" class="form-control" name='Descripcion' maxlength="100" minlength="0" value="{{$Lista_Tutorias->Descripcion}}" required>
                </div>

                {{-- Autor --}}
                <div class="form-group">
                    <label>Autor:</label>
                    <input id="autor" type="text" class="form-control" name='Autor' maxlength="100" minlength="0" value="{{$Lista_Tutorias->Nombre}} {{$Lista_Tutorias->Apellido}}" disabled required>
                    <input id="ID_Usuario" type="hidden" name='ID_Usuario' value="{{$Lista_Tutorias->ID_Usuario}}">
                </div>

                {{-- ACTIVO --}}

                <div class="form-check form-switch">

                    @if($Lista_Tutorias->Activo == 1)
                        <input class="form-check-input" type="checkbox" id="activo" name='activo' onchange="cambioActivo()" checked>
                        <label id="labelActivo">Habilitado</label>
                    @else
                        <input class="form-check-input" type="checkbox" id="activo" name='activo' onchange="cambioActivo()" unchecked>
                        <label id="labelActivo">Inhabilitado</label>
                    @endif
                    
                    
                    
                  </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>

            </form> 
        </div>
    </div>

@endsection

@extends('layouts.master')


@section('content')
    <div class="container-fluid">
        <div class="container">
            <h1>Creacion Curso de tutorias</h1>
            
            <form class="form-group" method="POST" action="/Tutoria">
                @csrf

                {{-- Asignacion de lenguaje --}}
                <label">Lenguaje de progrmacion:</label>
                <select class="form-select" name="ID_Lista_Tutorias" id="ID_Lista_Tutorias" aria-label="Seleccione la calle del estacionamiento" required>
                    <option value="">Seleccione el lenguaje de programacion</option>
                    @foreach ($Lista_Tutorias as $Lista_Tutorias)
                        <option 
                            value="{{$Lista_Tutorias->ID_Lista_Tutorias}}">{{$Lista_Tutorias->Nombre_Lenguaje}}
                        </option>
                        
                    @endforeach
                </select>

                {{-- Titulo --}}
                <div class="form-group">
                    <label>Titulo de tutoria:</label>
                    <input type="text" class="form-control" name='Titulo' maxlength="100" minlength="0" >
                </div>

                {{-- Numeracion --}}
                <div class="form-group">
                    <label>Posicion de tutoria:</label>
                    <input type="number" class="form-control" name='Numeracion' min="1" max="30" required>
                </div>

                
                {{-- Link_video --}}
                <div class="form-group">
                    <label>Link Video:</label>
                    <input type="text" class="form-control" name='Link_video' maxlength="100" minlength="0" >
                </div>
                
                {{-- Activacion --}}
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="activo" name='activo' onchange="cambioActivo()" checked>
                    <label id="labelActivo">Tutoria Habilitado</label>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
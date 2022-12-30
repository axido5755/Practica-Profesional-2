@extends('layouts.master')


@section('content')
    <div class="container-fluid">
        <div class="container">
            <h1>Creacion Curso de tutorias</h1>
            
            <form class="form-group" method="POST" action="/Lista_Tutorias">
                @csrf

                {{-- Lenguaje de tutoria --}}
                <div class="form-group">
                    <label>Lenguaje de tutoria:</label>
                    <input type="text" class="form-control" name='Nombre_Lenguaje' maxlength="100" minlength="0" >
                </div>

                {{-- Descripcion --}}
                <div class="form-group">
                    <label>Descripcion:</label>
                    <input type="text" class="form-control" name='Descripcion' maxlength="100" minlength="0" >
                </div>

                {{-- Autor --}}
                <div class="form-group">
                    <label>Autor:</label>
                    <input id="autor" type="text" class="form-control" name='Autor' maxlength="100" minlength="0" disabled>
                    <input id="ID_Usuario" type="hidden" name='ID_Usuario'>
                </div>
                
                {{-- ACTIVO --}}
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="activo" name='activo' onchange="cambioActivo()" checked>
                    <label id="labelActivo">Lista Tutoria Habilitado</label>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>

    <script>
        const usuarioJsonn = localStorage.getItem("usuario");
        const usuario = JSON.parse(usuarioJsonn);
        span = document.getElementById("autor");
        span.value  =`${usuario.Nombre} ${usuario.Apellido}`;

        Usuario_id = document.getElementById("ID_Usuario");
        Usuario_id.value =`${usuario.ID_Usuario}`;
    </script>
@endsection
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
                
                {{-- Contenido --}}

                <div class="container mt-4 mb-4">
                <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                <div class="row justify-content-md-center">
                    <div class="col-md-12 col-lg-8">
                        <label>Contenido</label>
                        <div class="form-group">
                            <textarea name='Contenido' id="Contenido"></textarea>
                        </div>
                    </div>
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

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
   tinymce.init({
     selector: '#Contenido', // Replace this CSS selector to match the placeholder element for TinyMCE
     statusbar: false,
     plugins: 'code table lists',
     toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
   });
 </script>

@endsection
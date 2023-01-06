@extends('layouts.master')


@section('content')

    <div class="container-fluid">
        <div class="container">


            <h1>Editando tutoria {{$Tutoria->Titulo}}</h1>

                        
            <form class="form-group" method="POST" action="/Tutoria/store2/{{$Tutoria->ID_Tutoria}}">
                @method('PUT')
                @csrf

                {{-- CALLE--}}
                <select class="form-select" name="ID_Lista_Tutorias" id="ID_Lista_Tutorias"  require>
                    @foreach ($Lista_Tutorias as $Lista_Tutorias)
                        @if($Lista_Tutorias->ID_Lista_Tutorias==$Tutoria->ID_Lista_Tutorias)
                        <option 
                            value="{{$Lista_Tutorias->ID_Lista_Tutorias}}" selected="">{{$Lista_Tutorias->Nombre_Lenguaje}}
                        </option>
                        @else
                        <option 
                            value="{{$Lista_Tutorias->ID_Lista_Tutorias}}">{{$Lista_Tutorias->Nombre_Lenguaje}}
                        </option>
                        @endif
                   
                    @endforeach
                </select>
                
                {{-- Titulo --}}
                <div class="form-group">
                    <label>Titulo de tutoria:</label>
                    <input type="text" class="form-control" name='Titulo' maxlength="100" minlength="0" value="{{$Tutoria->Titulo}}" required>
                </div>

                {{-- Numeracion --}}
                <div class="form-group">
                    <label>Posicion de tutoria:</label>
                    <input type="number" class="form-control" name='Numeracion' min="1" max="30" value="{{$Tutoria->Numeracion}}" required>
                </div>

                @if(count($errors)>0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <li> {{ implode('', $errors->all(':message')) }}</li>
                    </ul>
                </div>
                @endif

                {{-- Link_video --}}
                <div class="form-group">
                    <label>Link Video:</label>
                    <input type="text" class="form-control" name='Link_video' maxlength="100" minlength="0" value="{{$Tutoria->Link_Video}}" required>
                </div>

                {{-- Contenido --}}

                <div class="container mt-4 mb-4">
                <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                <div class="row justify-content-md-center">
                    <div class="col-md-12 col-lg-8">
                        <label>Contenido</label>
                        <div class="form-group">
                            <textarea name='Contenido' id="Contenido" value="{{$Tutoria->Contenido}}">{{$Tutoria->Contenido}}</textarea>
                        </div>
                    </div>
                </div>

                {{-- ACTIVO --}}

                <div class="form-check form-switch">

                    @if($Tutoria->Activo == 1)
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

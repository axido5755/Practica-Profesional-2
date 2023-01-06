@extends('layouts.master')

@section('content')


<main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Bienvenido al área de tutorías ICINF</h1>
          <p class="lead text-muted">Bienvenido al portal de Tutorías, espacio de difusión de la labor tutorial que se realiza en la Universidad del BíoBío.</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
          @foreach ($lista_Tutorias as $lista_Tutorias)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">

              <div id="{{$lista_Tutorias->ID_Lista_Tutorias}}">
                <a href="http://my-target-url.com" id="iframe-wrapper"></a>
                <iframe id="iframe_id" class="iframe_id" src="{{$lista_Tutorias->Link_video}}" width="100%" height="250" allowfullscreen></iframe>
              </div>

                
                <div class="card-body">
                    <h2>Lenguaje: {{$lista_Tutorias->Nombre_Lenguaje}}</h2>
                    <h6>{{$lista_Tutorias->Nombre}} {{$lista_Tutorias->Apellido}}</h6>
                  <p class="card-text">{{$lista_Tutorias->Descripcion}}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <script>
      var lista_Tutoria = {!! $lista_Tutoria !!}

      lista_Tutoria.forEach(element => {
        $('#'+element['ID_Lista_Tutorias']).click(function() {
        var url = '{{ url("/Tutorialistado/:slug") }}';
          url = url.replace(":slug", element['ID_Lista_Tutorias']);
          window.location.href=url;
        });
      });
    </script>
    
    <style>
      #iframe_id { pointer-events: none; }
    </style>

@stop
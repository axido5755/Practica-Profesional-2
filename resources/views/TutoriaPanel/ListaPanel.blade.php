@extends('layouts.master')

@section('content')


<main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Lenguaje: {{$Lista->Nombre_Lenguaje}}</h1>
          <p class="lead text-muted">{{$Lista->Descripcion}}</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
          @foreach ($lista_Tutorias as $lista_Tutorias)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">


              <div id="{{$lista_Tutorias->ID_Tutoria}}">
                <a href="http://my-target-url.com" id="iframe-wrapper"></a>
                <iframe id="iframe_id" class="iframe_id" src="{{$lista_Tutorias->Link_video}}" width="100%" height="250" allowfullscreen></iframe>
              </div>
                
                <div class="card-body">
                    <h3>Tutoria: {{$lista_Tutorias->Numeracion}}</h3>
                  <p class="card-text">{{$lista_Tutorias->Titulo}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
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
        $('#'+element['ID_Tutoria']).click(function() {
                     var url = '{{ url("/Tutoria/Video/:slug1/:slug2") }}';
          url = url.replace(":slug1", element['ID_Tutoria']);
          url = url.replace(":slug2", element['ID_Lista_Tutorias']);
          window.location.href=url;
        });
      });
    </script>
    
    <style>
      #iframe_id { pointer-events: none; }
    </style>
@stop
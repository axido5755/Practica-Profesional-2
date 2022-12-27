@extends('layouts.master')

@section('content')


<main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Bienvenido al area de tutorias ICINF</h1>
          <p class="lead text-muted">Bienvenido al portal de Tutorías, espacio de difusión de la labor tutorial que se realiza en la Universidad del BíoBío.</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
          @foreach ($lista_Tutorias as $lista_Tutorias)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">


                <div class="js-youtube-player youtube-player" data-id="{{$lista_Tutorias->Link_video}}"></div>

                
                <div class="card-body">
                    <h3>{{$lista_Tutorias->Nombre_Lenguaje}}</h3>
                  <p class="card-text">{{$lista_Tutorias->Descripcion}}</p>
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

<script>

(function () {
    getVideos();
})();
function getVideos() {
    var v = document.getElementsByClassName("youtube-player");
    for (var n = 0; n < v.length; n++) {
        var p = document.createElement("div");
        const words = v[n].getAttribute("data-id");
        var id = words.split('=')[1];        

        var placeholder = v[n].hasAttribute("data-thumbnail")
            ? v[n].getAttribute("data-thumbnail")
            : "";

        if (placeholder.length) p.innerHTML = createCustomThumbail(placeholder);
        else p.innerHTML = createThumbail(id);

        v[n].appendChild(p);
        p.addEventListener("click", function () {
          
        });
    }
}

function createCustomThumbail(url) {
    return (
        '<img class="youtube-thumbnail" src="' +
        url +
        '" alt="Youtube Preview" /><div class="youtube-play-btn"></div>'
    );
}
function createThumbail(id) {
    return (
        '<img class="youtube-thumbnail" src="//i.ytimg.com/vi_webp/' +
        id +
        '/maxresdefault.webp" alt="Youtube Preview"><div class="youtube-play-btn"></div>'
    );
}
    </script>

<style>
.youtube-container {
    display: block;
    width: 100%;
    max-width: 600px;
    margin: 30px auto;
}

.youtube-player {
    display: block;
    margin 20px auto;
    padding-bottom: 56.25%;
    overflow: hidden;
    position: relative;
    width: 100%;
    height: 100%;
    cursor: hand;
    cursor: pointer;
    display: block;
}

img.youtube-thumbnail {
    bottom: 0;
    display: block;
    left: 0;
    margin: auto;
    max-width: 100%;
    width: 100%;
    position: absolute;
    right: 0;
    top: 0;
    height: auto;
}

div.youtube-play-btn {
    height: 72px;
    width: 72px;
    left: 50%;
    top: 50%;
    margin-left: -36px;
    margin-top: -36px;
    position: absolute;
    background: url("https://freepngimg.com/thumb/categories/1398.png") no-repeat center center;
  background-size: 72px 72px;
}

.youtube-iframe {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
</style>
@stop
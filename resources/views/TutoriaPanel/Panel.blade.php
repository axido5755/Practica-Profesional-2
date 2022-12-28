@extends('layouts.master')

@section('content')

<div id="instructions">

<div class="youtube-container">
<div class="js-youtube-player youtube-player" data-id="{{$lista_Tutorias->Link_video}}" ></div>
</div>

<div class="container-fluid p-4">
        <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <h3>Tutoria: {{$lista_Tutorias->Numeracion}}</h3>

                <div>{!!$lista_Tutorias->Contenido!!}</div>

            </div>
        </div>
    </div>

</div>
  
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
            var parent = this.parentNode;
            const words = parent.getAttribute("data-id");
            var id = words.split('=')[1];    
            createIframe(parent, id);
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

function createIframe(v, id) {
    var iframe = document.createElement("iframe");
    console.log("{"+id+"}");
    iframe.setAttribute(
        "src",
        "//www.youtube.com/embed/"+id+"?autoplay=1&color=white&autohide=2&modestbranding=1&border=0&wmode=opaque&enablejsapi=1&showinfo=0&rel=0"
    );
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("class", "youtube-iframe");
    v.firstChild.replaceWith(iframe);
}

/** Pause video on modal close **/
$("#video-modal").on("hidden.bs.modal", function (e) {
    $(this).find("iframe").remove();
});

/** Pause video on modal close **/
$("#video-modal").on("show.bs.modal", function (e) {
    getVideos();
});
    </script>

<style>
.youtube-container {
    display: block;
    width: 100%;
    max-width: 1200px;
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





@endsection
@extends('layouts.master')

@section('content')

<div id="instructions">

        <div class="ex1">  
        <h3>Tutoria: {{$lista_Tutorias->Numeracion}}</h3>
                <iframe id="iframe_id" class="iframe_id" src="{{$lista_Tutorias->Link_video}}" width="100%" height="700"  allowfullscreen></iframe>
        </div>

<div class="container-fluid p-4">
        <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                
                <div>{!!$lista_Tutorias->Contenido!!}</div>

            </div>
        </div>
    </div>

</div>

<style>
.ex1 {
  margin: auto;
  width: 70%;
}
</style>

@endsection
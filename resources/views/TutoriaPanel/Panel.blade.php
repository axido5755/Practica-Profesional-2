@extends('layouts.master')

@section('content')

<div id="instructions">

        <div>  
                <iframe id="iframe_id" class="iframe_id" src="{{$lista_Tutorias->Link_video}}" width="100%" height="600"  allowfullscreen></iframe>
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

@endsection
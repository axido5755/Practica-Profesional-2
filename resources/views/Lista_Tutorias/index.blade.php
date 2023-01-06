@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <h1>Listado de tutorias</h1>
            <div>
                <div class="row">
                    <div class="col col-xs" style="margin-inline: 0px; padding-inline: 0px">
                        <a class="btn btn-primary" href="/Lista_Tutorias/create">Crear curso de tutorias</a>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-bordered table-responsive-lg">
                <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Rut</th>
                    <th>Nombre_Lenguaje</th>
                    <th>Activo</th>
                    <th>Curso completo</th>
                    <th>Edicion</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                
                <tbody>
                    @foreach ($lista_Tutorias as $lista_Tutorias)
                                          
                        <tr>
                            <td>{{$lista_Tutorias->Nombre}} {{$lista_Tutorias->Apellido}}</td>
                            <td>{{$lista_Tutorias->Rut}}</td>
                            <td>{{$lista_Tutorias->Nombre_Lenguaje}}</td>
                           

                            @if($lista_Tutorias->Activo == 1)
                                <td>
                                    <i class="fas fa-check"></i>
                                </td>
                            @else
                                <td>
                                    <i class="fas fa-times"></i>
                                </td>
                                
                            @endif
                        </td>

                        {{-- Boton de Ver detalle completo --}}
                        <td>
                            <form action="{{url('/Tutoria/listado/'.$lista_Tutorias->ID_Lista_Tutorias)}}" method="POST" >
                                {{csrf_field() }}
                                {{method_field('GET')}}
                                <button type="submit" class="btn btn-block btn-success">Ver mas</button>
                            </form>
                        </td>

                        <td>
                            <a href="{{url('/Lista_Tutorias/edit2/'.$lista_Tutorias->ID_Lista_Tutorias)}}">
                            <input type="button" class="btn btn-block btn-warning" name="btn" value="Editar" id="submitBtn"
                                data-toggle="modal" class="btn btn-secondary" />
                            </a>
                        </td>

                        <td>
                        <form class="modal-content" action="{{url('/Lista_Tutorias/'.$lista_Tutorias->ID_Lista_Tutorias)}}" method="post" >
                            <input type="button" class="btn btn-block btn-danger" name="btn" value="Eliminar" id="submitBtn"
                                data-toggle="modal" data-target="#id{{$lista_Tutorias->ID_Lista_Tutorias}}" class="btn btn-secondary" />
                            <div class="modal fade" id="id{{$lista_Tutorias->ID_Lista_Tutorias}}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¿Desea borrar el comentario?</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Si borra el comentario no lo podra recuperar.</p>
                                          </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                           
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </td>


                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

@endsection
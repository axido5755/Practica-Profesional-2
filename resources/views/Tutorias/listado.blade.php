@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <h1>Listado de tutorias</h1>        
            <div>

                <div class="row">
                    <div class="col col-xs" style="margin-inline: 0px; padding-inline: 0px">
                        <a class="btn btn-primary" href="/Tutoria/create2/{{$ID_Lista_Tutorias}}">Crear tutoria</a>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-bordered table-responsive-lg">
                <thead>
                  <tr>
                    <th>Numeracion</th>
                    <th>Titulo</th>
                    <th>Link_video</th>
                    <th>Activo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                
                <tbody>
                    @foreach ($lista_Tutorias as $lista_Tutorias)
                                          
                        <tr>
                            <td>{{$lista_Tutorias->Numeracion}}</td>
                            <td>{{$lista_Tutorias->Titulo}}</td>
                            <td>{{$lista_Tutorias->Link_video}}</td>

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

                        <td>
                            <a href="/Tutoria/edit2/{{$lista_Tutorias->ID_Tutoria}}">
                            <input type="button" class="btn btn-block btn-warning" name="btn" value="Editar" id="submitBtn"
                                data-toggle="modal" class="btn btn-secondary" />
                            </a>
                        </td>

                        <td>
                        <form action="{{url('/Tutoria/'.$lista_Tutorias->ID_Tutoria)}}" method="POST" >
                            <input type="button" class="btn btn-block btn-danger" name="btn" value="Eliminar" id="submitBtn"
                                data-toggle="modal" data-target="#id{{$lista_Tutorias->ID_Tutoria}}" class="btn btn-secondary" />
                            <div class="modal fade" id="id{{$lista_Tutorias->ID_Tutoria}}" tabindex="-1" role="dialog"
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
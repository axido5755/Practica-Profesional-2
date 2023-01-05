@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <h1>Listado de tutorias</h1>
    
            <div>
                <a class="btn btn-primary" href="/Tutoria/create2/{{$ID_Lista_Tutorias}}">Crear tutoria</a>
            </div>
            
            
            <div>
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
                                <i class="fas fa-edit  fa-lg" ></i>
                            </a>
                        </td>

                        <td>
                            <div>
                                <a name="btn" id="submitBtn" 
                                data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>

                            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¿Desea borrar la tutoria de {{$lista_Tutorias->Titulo}}?</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Si elimina la tutoria se borra permanentemente.</p>
                                          </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form action="" method="POST" >
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-primary">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>


                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

@endsection
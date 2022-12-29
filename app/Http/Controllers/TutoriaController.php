<?php

namespace App\Http\Controllers;

use App\Models\Tutoria;
use App\Models\lista_tutoria;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TutoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Lista_Tutorias = lista_tutoria::all();
        return view('Tutorias.create', compact('Lista_Tutorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'ID_Lista_Tutorias'=>'required|integer',
            'Titulo'  => 'max:100',
            'Numeracion'=>'required|integer|max:1000000',
            'Link_video'  => 'max:100',
        ];
        
        $Mensaje=[
            "ID_Lista_Tutorias.required"=>'Debe seleccionar un lenguaje a trabajar',
            "Titulo.max"=>'El campo Titulo no debe superar los 100 caracteres',
            "Numeracion.required"=>'Debe ingresar un numero de tutoria (posicion)',
            "Link_video.max"=>'El campo link no debe superar los 100 caracteres'
        ];
        $this->validate($request,$campos,$Mensaje);

        $Tutoria = new Tutoria();
        $Tutoria->ID_Lista_Tutorias = $request->input('ID_Lista_Tutorias');
        $Tutoria->Titulo =  $request->input('Titulo');
        $Tutoria->Numeracion =  $request->input('Numeracion');
        $Tutoria->Link_video =  $request->input('Link_video');
        $Tutoria->Contenido =  $request->input('Contenido');
        $Tutoria->Fecha_Publicacion =  Carbon::now();

        if($request->input('activo')=='on'){
            $Tutoria->Activo = true;
        }else{
            $Tutoria->Activo = false;
        }
        $Tutoria->save();


        $lista_Tutorias = DB::table('lista_Tutorias') 
        ->join('usuarios','lista_Tutorias.ID_Usuario','=','usuarios.ID_Usuario')
        ->select(   'lista_Tutorias.ID_Lista_Tutorias',
                    'usuarios.Nombre',
                    'usuarios.Apellido',
                    'usuarios.Rut',
                    'lista_Tutorias.Nombre_Lenguaje',
                    'lista_Tutorias.Activo')
        ->get();


        return view('lista_Tutorias.index', compact('lista_Tutorias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutoria  $tutoria
     * @return \Illuminate\Http\Response
     */
    public function show(Tutoria $tutoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutoria  $tutoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutoria $tutoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutoria  $tutoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutoria $tutoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutoria  $tutoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutoria $tutoria)
    {
        //
    }

    public function listado($ID_Lista_Tutorias)
    {
        $lista_Tutorias = DB::table('tutorias') 
        ->join('lista_tutorias','tutorias.ID_Lista_Tutorias','=','lista_tutorias.ID_Lista_Tutorias')
        ->select(   'tutorias.ID_Lista_Tutorias',
                    'tutorias.Titulo',
                    'tutorias.Numeracion',
                    'tutorias.Link_video',
                    'tutorias.Activo')
        ->where("tutorias.ID_Lista_Tutorias",$ID_Lista_Tutorias) 
        ->get();
        
        return view('Tutorias.listado', compact('lista_Tutorias'));
    }

    public function listadohome($ID_Lista_Tutorias)
    {
        $lista_Tutorias = DB::table('tutorias') 
        ->select(   'tutorias.ID_Tutoria',
                    'tutorias.ID_Lista_Tutorias',
                    'tutorias.Titulo',
                    'tutorias.Numeracion',
                    'tutorias.Link_video',
                    'tutorias.Activo')
        ->where("tutorias.ID_Lista_Tutorias",$ID_Lista_Tutorias) 
        ->get();

        $Lista = DB::table('lista_tutorias') 
        ->select(   'lista_tutorias.Nombre_Lenguaje',
                    'lista_tutorias.Descripcion')
        ->where("lista_tutorias.ID_Lista_Tutorias",$ID_Lista_Tutorias) 
        ->first();

        return view('TutoriaPanel.ListaPanel', compact('lista_Tutorias','Lista'));
    }

    public function video($ID_Lista,$ID_Lista_Tutorias){

        $lista_Tutorias = DB::table('tutorias') 
        ->select(   'tutorias.ID_Tutoria',
                    'tutorias.ID_Lista_Tutorias',
                    'tutorias.Titulo',
                    'tutorias.Numeracion',
                    'tutorias.Link_video',
                    'tutorias.Activo',
                    'tutorias.Contenido')
        ->where("tutorias.ID_Tutoria",$ID_Lista) 
        ->where("tutorias.ID_Lista_Tutorias",$ID_Lista_Tutorias) 
        ->first();
        return view('TutoriaPanel.Panel', compact('lista_Tutorias'));

    }
}

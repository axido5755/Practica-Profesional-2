<?php

namespace App\Http\Controllers;

use App\Models\Tutoria;
use App\Models\lista_tutoria;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Redirect;

class TutoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista_Tutorias = DB::table('tutorias')
        ->rightJoin('lista_tutorias','tutorias.ID_Lista_Tutorias','=','lista_tutorias.ID_Lista_Tutorias')
        ->leftJoin('usuarios','lista_tutorias.ID_Usuario','=','usuarios.ID_Usuario') 
        ->select(   'lista_tutorias.ID_Lista_Tutorias',
                    'lista_tutorias.Nombre_Lenguaje',
                    'lista_tutorias.Descripcion',
                    'usuarios.Nombre',
                    'usuarios.Apellido',
                    'tutorias.Link_video')
        ->get();
        $lista_Tutoria = $lista_Tutorias;
        return view('Home', compact('lista_Tutorias','lista_Tutoria'));
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
        if(Tutoria::where('Numeracion',$request->input('Numeracion'))
                    ->where('ID_Lista_Tutorias',$request->input('ID_Lista_Tutorias'))
                    ->first() != null) return Redirect::back()->withErrors("La posicion de la tutoria ya existe");
            

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



        $ID_Usuario = DB::table('lista_tutorias')
        ->leftJoin('usuarios','lista_tutorias.ID_Usuario','=','usuarios.ID_Usuario') 
        ->select('usuarios.ID_Usuario')
        ->where('lista_tutorias.ID_Lista_Tutorias',$request->input('ID_Lista_Tutorias'))
        ->first();
        
        $ID_Usuario = $ID_Usuario->ID_Usuario;


        $lista_Tutorias = DB::table('lista_tutorias') 
        ->leftJoin('usuarios','lista_tutorias.ID_Usuario','=','usuarios.ID_Usuario')
        ->select(   'lista_tutorias.ID_Lista_Tutorias',
                    'usuarios.Nombre',
                    'usuarios.Apellido',
                    'usuarios.Rut',
                    'lista_tutorias.Nombre_Lenguaje',
                    'lista_tutorias.Activo')
        ->where('lista_tutorias.ID_Usuario',$ID_Usuario)
        ->get();

        return view('Lista_Tutorias.index', compact('lista_Tutorias'));
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
    public function destroy($ID_Tutoria)
    {

        $ID_Lista_Tutorias = Tutoria::where('ID_Tutoria',$ID_Tutoria)->first()->ID_Lista_Tutorias;
        Tutoria::where('ID_Tutoria',$ID_Tutoria)->delete();

        $lista_Tutorias = DB::table('tutorias') 
        ->join('lista_tutorias','tutorias.ID_Lista_Tutorias','=','lista_tutorias.ID_Lista_Tutorias')
        ->select(   'tutorias.ID_Tutoria',
                    'tutorias.ID_Lista_Tutorias',
                    'tutorias.Titulo',
                    'tutorias.Numeracion',
                    'tutorias.Link_video',
                    'tutorias.Activo')
        ->where("tutorias.ID_Lista_Tutorias",$ID_Lista_Tutorias) 
        ->get();
    
        return view('Tutorias.listado', compact('lista_Tutorias','ID_Lista_Tutorias'));
    }

    public function listado($ID_Lista_Tutorias)
    {
        $lista_Tutorias = DB::table('tutorias') 
        ->join('lista_tutorias','tutorias.ID_Lista_Tutorias','=','lista_tutorias.ID_Lista_Tutorias')
        ->select(   'tutorias.ID_Tutoria',
                    'tutorias.ID_Lista_Tutorias',
                    'tutorias.Titulo',
                    'tutorias.Numeracion',
                    'tutorias.Link_video',
                    'tutorias.Activo')
        ->where("tutorias.ID_Lista_Tutorias",$ID_Lista_Tutorias) 
        ->get();
        
        return view('Tutorias.listado', compact('lista_Tutorias','ID_Lista_Tutorias'));
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

        $lista_Tutoria =$lista_Tutorias;

        return view('TutoriaPanel.ListaPanel', compact('lista_Tutorias','Lista','lista_Tutoria'));
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

    public function create2($ID_Lista_Tutorias)
    {
        $Lista_Tutorias = lista_tutoria::where('ID_Lista_Tutorias',$ID_Lista_Tutorias)->first();
        $id_lista = $ID_Lista_Tutorias;
        $Nombre_Lenguaje = $Lista_Tutorias->Nombre_Lenguaje;
        $Tutorias = Tutoria::select('Numeracion')->where('ID_Lista_Tutorias',$ID_Lista_Tutorias)->get();
        return view('Tutorias.create', compact('Nombre_Lenguaje','id_lista','Tutorias'));
    }

    public function edit2($ID_Tutoria)
    {

        $ID_Usuario = DB::table('tutorias')
        ->rightJoin('lista_tutorias','tutorias.ID_Lista_Tutorias','=','lista_tutorias.ID_Lista_Tutorias')
        ->leftJoin('usuarios','lista_tutorias.ID_Usuario','=','usuarios.ID_Usuario') 
        ->select('usuarios.ID_Usuario')
        ->where('tutorias.ID_Tutoria',$ID_Tutoria)
        ->first();
        
        $ID_Usuario = $ID_Usuario->ID_Usuario;
        
        $Tutoria = Tutoria::where('ID_Tutoria',$ID_Tutoria)->first();
        $Lista_Tutorias = lista_tutoria::where('ID_Usuario',$ID_Usuario)->get();
        return view('Tutorias.edit', compact('Tutoria','Lista_Tutorias','ID_Tutoria'));
    }

    public function store2(Request $request,$ID_Tutoria)
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
        if(Tutoria::where('Numeracion',$request->input('Numeracion'))
        ->where('ID_Lista_Tutorias',$request->input('ID_Lista_Tutorias'))
        ->first() != null)
            if(Tutoria::where('ID_Tutoria',$ID_Tutoria)
                        ->first()
                        ->Numeracion != $request->input('Numeracion')) return Redirect::back()->withErrors("La posicion de la tutoria ya existe");
            

        $Tutoria = Tutoria::where('ID_Tutoria',$ID_Tutoria)->first();
        $Tutoria->ID_Lista_Tutorias = $request->input('ID_Lista_Tutorias');
        $Tutoria->Titulo =  $request->input('Titulo');
        $Tutoria->Numeracion =  $request->input('Numeracion');
        $Tutoria->Link_video =  $request->input('Link_video');
        $Tutoria->Contenido =  $request->input('Contenido');

        if($request->input('activo')=='on'){
            $Tutoria->Activo = true;
        }else{
            $Tutoria->Activo = false;
        }
        $Tutoria->save();

        $lista_Tutorias = DB::table('tutorias') 
        ->join('lista_tutorias','tutorias.ID_Lista_Tutorias','=','lista_tutorias.ID_Lista_Tutorias')
        ->select(   'tutorias.ID_Tutoria',
                    'tutorias.ID_Lista_Tutorias',
                    'tutorias.Titulo',
                    'tutorias.Numeracion',
                    'tutorias.Link_video',
                    'tutorias.Activo')
        ->where("tutorias.ID_Lista_Tutorias",$request->input('ID_Lista_Tutorias')) 
        ->get();
        
        $ID_Lista_Tutorias = $request->input('ID_Lista_Tutorias');
        return view('Tutorias.listado', compact('lista_Tutorias','ID_Lista_Tutorias'));
    }
}

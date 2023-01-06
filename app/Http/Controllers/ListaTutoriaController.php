<?php

namespace App\Http\Controllers;

use App\Models\lista_tutoria;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ListaTutoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista_Tutorias = DB::table('lista_tutorias') 
        ->join('usuarios','lista_tutorias.ID_Usuario','=','usuarios.ID_Usuario')
        ->select(   'lista_tutorias.ID_Lista_Tutorias',
                    'usuarios.ID_Usuario',
                    'usuarios.Nombre',
                    'usuarios.Apellido',
                    'usuarios.Rut',
                    'lista_tutorias.Nombre_Lenguaje',
                    'lista_tutorias.Activo')
        ->get();
        
        return view('Lista_Tutorias.index', compact('lista_Tutorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Lista_Tutorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        //  dd($request);

        $campos=[
            'Nombre_Lenguaje'  => 'max:100'
            
        ];
        
        $Mensaje=[
            "Nombre_Lenguaje.max"=>'El campo del nombre de lenguaje no debe superar los 100 caracteres'
        ];

        $this->validate($request,$campos,$Mensaje);

        $Lista_Tutorias = new lista_tutoria();
        $Lista_Tutorias->Nombre_Lenguaje =  $request->input('Nombre_Lenguaje');
        $Lista_Tutorias->Descripcion =  $request->input('Descripcion');
        $Lista_Tutorias->ID_Usuario =  $request->input('ID_Usuario');
        $Lista_Tutorias->Fecha_Creacion =  Carbon::now();

        if($request->input('activo')=='on'){
            $Lista_Tutorias->Activo = true;
        }else{
            $Lista_Tutorias->Activo = false;
        }

        $Lista_Tutorias->save();

        $Lista_Tutorias = lista_tutoria::select('ID_Lista_Tutorias','Nombre_Lenguaje')->orderBy('ID_Lista_Tutorias', 'desc')->first();
        $id_lista = $Lista_Tutorias->ID_Lista_Tutorias;
        $Nombre_Lenguaje = $Lista_Tutorias->Nombre_Lenguaje;
        return view('Tutorias.create', compact('id_lista','Nombre_Lenguaje'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lista_tutoria  $lista_Tutorias
     * @return \Illuminate\Http\Response
     */
    public function show(lista_tutoria $lista_Tutorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lista_tutoria  $lista_Tutorias
     * @return \Illuminate\Http\Response
     */
    public function edit(lista_tutoria $lista_Tutorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lista_tutoria  $lista_Tutorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lista_tutorias $lista_Tutorias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lista_tutoria  $lista_Tutorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_Lista_Tutorias)
    {
        lista_tutoria::where('ID_Lista_Tutorias',$ID_Lista_Tutorias)->delete();

        $lista_Tutorias = DB::table('lista_tutorias') 
        ->join('usuarios','lista_tutorias.ID_Usuario','=','usuarios.ID_Usuario')
        ->select(   'lista_tutorias.ID_Lista_Tutorias',
                    'usuarios.Nombre',
                    'usuarios.Apellido',
                    'usuarios.Rut',
                    'lista_tutorias.Nombre_Lenguaje',
                    'lista_tutorias.Activo')
        ->get();


        return view('Lista_Tutorias.index', compact('lista_Tutorias'));
    }

    public function listado()
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

    public function edit2($ID_Lista_Tutorias)
    {

        $Lista_Tutorias = DB::table('lista_tutorias')
        ->Join('usuarios','lista_tutorias.ID_Usuario','=','usuarios.ID_Usuario') 
        ->where('ID_Lista_Tutorias',$ID_Lista_Tutorias)
        ->first();

        return view('Lista_Tutorias.edit', compact('Lista_Tutorias'));
    }

    public function store2(Request $request,$ID_Lista_Tutorias)
    {

 //return $request->all();

        //  dd($request);

        $campos=[
            'Nombre_Lenguaje'  => 'max:100'
            
        ];
        
        $Mensaje=[
            "Nombre_Lenguaje.max"=>'El campo del nombre de lenguaje no debe superar los 100 caracteres'
        ];

        $this->validate($request,$campos,$Mensaje);

        $Lista_Tutorias = lista_tutoria::where('ID_Lista_Tutorias',$ID_Lista_Tutorias)->first();
        $Lista_Tutorias->Nombre_Lenguaje =  $request->input('Nombre_Lenguaje');
        $Lista_Tutorias->Descripcion =  $request->input('Descripcion');
        $Lista_Tutorias->ID_Usuario =  $request->input('ID_Usuario');
        $Lista_Tutorias->Fecha_Creacion =  Carbon::now();

        if($request->input('activo')=='on'){
            $Lista_Tutorias->Activo = true;
        }else{
            $Lista_Tutorias->Activo = false;
        }

        $Lista_Tutorias->save();

        $lista_Tutorias = DB::table('lista_tutorias') 
        ->join('usuarios','lista_tutorias.ID_Usuario','=','usuarios.ID_Usuario')
        ->select(   'lista_tutorias.ID_Lista_Tutorias',
                    'usuarios.Nombre',
                    'usuarios.Apellido',
                    'usuarios.Rut',
                    'lista_tutorias.Nombre_Lenguaje',
                    'lista_tutorias.Activo')
        ->get();


        return view('Lista_Tutorias.index', compact('lista_Tutorias'));

    }


}

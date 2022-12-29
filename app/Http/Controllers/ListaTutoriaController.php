<?php

namespace App\Http\Controllers;

use App\Models\lista_Tutoria;
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

        $Lista_Tutorias = new lista_Tutoria();
        $Lista_Tutorias->Nombre_Lenguaje =  $request->input('Nombre_Lenguaje');
        $Lista_Tutorias->Descripcion =  $request->input('Descripcion');
        $Lista_Tutorias->ID_Usuario =  1;
        $Lista_Tutorias->Fecha_Creacion =  Carbon::now();

        if($request->input('activo')=='on'){
            $Lista_Tutorias->Activo = true;
        }else{
            $Lista_Tutorias->Activo = false;
        }

        $Lista_Tutorias->save();

        $Lista_Tutorias = lista_Tutoria::all();
        return view('Tutorias.create', compact('Lista_Tutorias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lista_Tutorias  $lista_Tutorias
     * @return \Illuminate\Http\Response
     */
    public function show(Lista_Tutorias $lista_Tutorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lista_Tutorias  $lista_Tutorias
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista_Tutorias $lista_Tutorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lista_Tutorias  $lista_Tutorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista_Tutorias $lista_Tutorias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lista_Tutorias  $lista_Tutorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista_Tutorias $lista_Tutorias)
    {
        //
    }

    public function listado()
    {
        $lista_Tutorias = DB::table('tutorias')
        ->rightJoin('lista_Tutorias','tutorias.ID_Lista_Tutorias','=','lista_Tutorias.ID_Lista_Tutorias')
        ->leftJoin('usuarios','lista_Tutorias.ID_Usuario','=','usuarios.ID_Usuario') 
        ->select(   'lista_Tutorias.ID_Lista_Tutorias',
                    'lista_Tutorias.Nombre_Lenguaje',
                    'lista_Tutorias.Descripcion',
                    'usuarios.Nombre',
                    'usuarios.Apellido',
                    'tutorias.Link_video')
        ->get();
        $lista_Tutorias = $lista_Tutorias->unique('Nombre_Lenguaje');
        return view('Home', compact('lista_Tutorias'));
    }
}

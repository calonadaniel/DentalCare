<?php

namespace App\Http\Controllers;

use App\resumenclinico;
use App\expediente;
use Illuminate\Http\Request;

class ResumenclinicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $expedientes = expediente::Orderby('nombre','asc')->get();
        return view('resumenclinico', compact('expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $action = "add";

        request()->validate([
            $action.'_id_expedienteselected' => 'required|integer',
            //$action.'_id_resumen' =>'required|integer', //mejorar en siguiente version esta validacion
            $action.'_fecha' => 'required|date',
            $action.'_detalles' => 'required|string',
           
        ]);

        $registro_clinico = array(   
            /*El input id_expedienteselected no esta en el form base resumenclinico.blade ya que este almacena
            el valor de un slider el cual los otros modales no los debe mostrar*/
            'id_expediente' => $request->input($action.'_id_expedienteselected'),
            'fecha'=> $request->input($action.'_fecha'),
            'detalles'=>$request->input($action.'_detalles'),
        );
        resumenclinico::create($registro_clinico);
        return redirect()->route('resumenclinico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\resumenclinico  $resumenclinico
     * @return \Illuminate\Http\Response
     */
    public function show(resumenclinico $resumenclinico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\resumenclinico  $resumenclinico
     * @return \Illuminate\Http\Response
     */
    public function edit(resumenclinico $resumenclinico)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\resumenclinico  $resumenclinico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resumenclinico $resumenclinico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\resumenclinico  $resumenclinico
     * @return \Illuminate\Http\Response
     */
    public function destroy(resumenclinico $resumenclinico)
    {
        //
    }
}

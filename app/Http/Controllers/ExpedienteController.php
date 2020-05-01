<?php

namespace App\Http\Controllers;
use App\expediente;
use App\fotos;
use App\pagos;
use File;
use App\resumenclinico;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $expedientes = expediente::Orderby('nombre','asc')->paginate(15);
        /* Probando la relacion con la tabla pagos
        $pagos = expediente::find(2)->pagos;
        dd($pagos);*/
        return view('index', compact('expedientes'));
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
        $expediente = $this->fillabledata($action, $request);
        $expediente = json_decode($expediente, true);

        expediente::create($expediente);
        return redirect()->route('expediente.index');
    }    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $action = "edit";
        $expediente = $this->fillabledata($action, $request);
        $expediente = json_decode($expediente, true);
        /* echo "<pre>";print_r($expedientes); die;*/
        expediente::findorFail($request->edit_id_expediente)->update($expediente);
        return redirect()->route('expediente.index');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id_expediente = $request->delete_id_expediente;

        /* echo "<pre>";print_r($borrar); die;*/
        fotos::where('id_expediente', 'like', $id_expediente)->delete();
        $path = public_path('images/'.$id_expediente);
        File::deleteDirectory($path);

        resumenclinico::where('id_expediente', 'like', $id_expediente)->delete();
        pagos::where('id_expediente', 'like', $id_expediente)->delete();

        $borrarexpediente = expediente::findorFail($id_expediente);
        $borrarexpediente->delete();
        return redirect()->route('expediente.index');
    }

    /*Action: ejemplo: add, edit. Con esta funcion evito copiar y pegar el mismo codigo  y solo llamo esta funcion dentro del 
    update y el create o alguna a futuro en caso de ser requerio*/
    public function fillabledata($action, Request $request) {
        //Este array es el que se envia para crear y editar expedientes 
        $expediente = array(     
            'nombre' => $request->input($action.'_nombre')?: '',
            'apellido'=> $request->input($action.'_apellido')?: '',
            'direccion'=> $request->input($action.'_direccion')?: '',
            'costo_tratamiento'=>$request->input($action.'_costo_tratamiento')?: '',
            'prima_inicial'=>$request->input($action.'_prima_inicial')?: '',

            'edad'=>$request->input($action.'_edad')?:'',
            'encargado'=>$request->input($action.'_encargado')?:'',
            'telefono'=>$request->input($action.'_telefono')?:'',
            'sexo'=>$request->input($action.'_sexo')?:'',
            'fecha_inicio'=>$request->input($action.'_fecha_inicio')?:'',
            'higiene'=>$request->input($action.'_higiene')?:'',
            'actividad_cariogenica'=>$request->input($action.'_actividad_cariogenica')?:'',
            'habitos'=>$request->input($action.'_habitos')?:'',

            'dentpersuperiorizquierda'=>$request->input($action.'_dentpersuperiorizquierda'), 'dentpersuperiorderecha'=>$request->input($action.'_dentpersuperiorderecha'),
            'dentperinferiorizquierda'=>$request->input($action.'_dentperinferiorizquierda'), 'dentperinferiorderecha'=>$request->input($action.'_dentperinferiorderecha'),

            'denttemsuperiorizquierda'=>$request->input($action.'_denttemsuperiorizquierda'), 'denttemsuperiorderecha'=>$request->input($action.'_denttemsuperiorderecha'),
            'dentteminferiorizquierda'=>$request->input($action.'_dentteminferiorizquierda'),'dentteminferiorderecha'=>$request->input($action.'_dentteminferiorderecha'),

            'extraccion_indicada'=>$request->input($action.'_extraccion_indicada'),
            'cirugia_impacto'=>$request->input($action.'_cirugia_impacto'),
            'dentdetalles'=>$request->input($action.'_dentdetalles'),
            'arcada_superior'=>$request->input($action.'_arcada_superior'),
            'arcada_inferior'=>$request->input($action.'_arcada_inferior'),
            'tipo_mordida'=>$request->input($action.'_tipo_mordida'),
            'duracion_tratamiento'=>$request->input($action.'_duracion_tratamiento'),
            'relacionmolar'=>$request->input($action.'_relacionmolar'),
            'duracion_tratamiento'=>$request->input($action.'_duracion_tratamiento'),
            'relacioncanino'=>$request->input($action.'_relacioncanino'),
            'antecedente_familiar'=>$request->input($action.'_antecedente_familiar'),
            );
        
        return json_encode($expediente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }
}

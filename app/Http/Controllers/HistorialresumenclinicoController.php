<?php

namespace App\Http\Controllers;

use App\expediente;
use App\resumenclinico;

use Illuminate\Http\Request;

class HistorialresumenclinicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request, $id_expediente)
    {
 
        $resumenclinico = resumenclinico::where('id_expediente','=',$id_expediente)
                                ->OrderBy('fecha','asc')
                                ->get();

        $expediente = expediente::find($id_expediente);
        return view('historialresumenclinico',compact ('resumenclinico', 'expediente'));
    }

    public function update(Request $request)
    { 
        $action = "edit";

        $registro_clinico = $this->fillabledata($action, $request);
        $registro_clinico = json_decode($registro_clinico, true);
        
        $id_expediente = $registro_clinico["id_expediente"];
        /*echo "<pre>";print_r($registro_pago); die;*/
        resumenclinico::findorFail($registro_clinico["id_resumen"])->update($registro_clinico);
        return redirect()->route('historialresumenclinico.index', $id_expediente);
        
    }

    public function store(Request $request){

        $action = "add";
        $registro_clinico = $this->fillabledata($action, $request);
        $registro_clinico = json_decode($registro_clinico, true);
        $id_expediente = $registro_clinico["id_expediente"];

        resumenclinico::create($registro_clinico);
        return redirect()->route('historialresumenclinico.index', $id_expediente);

    }

    public function destroy(Request $request )
    {
        $action = "delete";
        $id_expediente = $request->input($action.'_id_expediente');
        $id_resumen = $request->input($action.'_id_resumen');
        
        $borrarregistro = resumenclinico::findorFail($id_resumen);
        $borrarregistro->delete();
        return redirect()->route('historialresumenclinico.index', $id_expediente);
    }

    /*Action: ejemplo: add, edit. Con esta funcion evito copiar y pegar el mismo codigo  y solo llamo esta funcion dentro del 
    update y el create o alguna a futuro en caso de ser requerio*/
    public function fillabledata($action, Request $request) {
        //Este array es el que se envia para crear y editar regstros clinicos 
        $registro_clinico = array(     
            'id_expediente'=>$request->input($action.'_id_expediente'),
            'id_resumen'=> $request->input($action.'_id_resumen'),
            'fecha' => $request->input($action.'_fecha')?: '',
            'detalles'=> $request->input($action.'_detalles')?: '',
            );
        return json_encode($registro_clinico);
    }
}

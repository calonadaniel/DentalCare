<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\expediente;
use App\pagos;
use PDF;

class HistorialpagosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request, $id_expediente)
    {
        /*Lllamo la funcion dando como el parametro id_expediente y lo guardo en la variable data 
        la cual es un array conteneiendo los valores retornados*/
        $data = $this->datapagos($id_expediente);
        //Selecciono el index con el dato que necesito almacenandolo en una varaiale
        $historial_pagos = $data[0];
        $expediente = $data[1];
        $balance = $data[2];

        return view('historialpagos',compact ('historial_pagos', 'expediente', 'balance'));
        
    }

    public function update(Request $request)
    { 
        $action = "edit";
        $registro_pago = $this->fillabledata($request, $action);
        $registro_pago = json_decode($registro_pago, true);
        $id_expediente = $registro_pago["id_expediente"];
        $id_pago = $registro_pago["id_pago"];

        /*echo "<pre>";print_r($registro_pago); die;*/
        pagos::findorFail($id_pago)->update($registro_pago);
        return redirect()->route('historialpagos.index',$id_expediente);
        
    }

    public function store(Request $request){

        $action = "add";
        $registro_pago = $this->fillabledata($request, $action);
        $registro_pago = json_decode($registro_pago, true);
        $id_expediente = $registro_pago["id_expediente"];
        
        pagos::create($registro_pago);
        return redirect()->route('historialpagos.index', $id_expediente);

    }

    public function destroy(Request $request)
    {
        $action = "delete";
        $id_expediente = $request->input($action.'_id_expediente');
        $id_pago = $request->input($action.'_id_pago');
        
       /*  echo "<pre>";print_r($borrar); die;*/

        $borrarpago = pagos::findorFail($id_pago);
        $borrarpago->delete();
        return redirect()->route('historialpagos.index', $id_expediente);
    }

    public function pdf ($id_expediente)
    {
        $data = $this->datapagos($id_expediente);
        $historial_pagos = $data[0];
        $expediente = $data[1];
        $balance = $data[2];
        
        $pdf = PDF::loadView('historialpagospdf', compact ('historial_pagos', 'expediente', 'balance'));
        return $pdf->stream();        
    }

    /*Action: ejemplo: add, edit. Con esta funcion evito copiar y pegar el mismo codigo  y solo llamo esta funcion dentro del 
    update y el create o alguna a futuro en caso de ser requerio*/
    public function fillabledata(Request $request, $action) {
        //Este array es el que se envia para crear y editar pagos 
        $registro_pago = array(     
            'id_expediente'=>$request->input($action.'_id_expediente'),
            'id_pago'=> $request->input($action.'_id_pago'),
            'cuota'=> $request->input($action.'_cuota')?: '0',
            'saldo'=> $request->input($action.'_saldo')?: '0',
            'fecha' => $request->input($action.'_fecha')?: now(),
            'detalles'=> $request->input($action.'_detalles')?: '',
            );
        return json_encode($registro_pago);
    }

    //Este funcion es para no repetir el codigo dos veces en la funcion de index y pdf.
    // La explicacion de como traer los datos estan en en la funcion index. 
    public function datapagos($id_expediente){

        $historial_pagos = pagos::where('id_expediente','=',$id_expediente)
        ->OrderBy('fecha','asc')
        ->get();

        $expediente = expediente::find($id_expediente);

        $totalcuota = pagos::where('id_expediente','=',$id_expediente)
            ->select('cuota')
            ->sum('cuota');

        $inicial = $expediente->costo_tratamiento - $expediente->prima_inicial;
        $balance = $inicial - $totalcuota;
        //return un array con los valores que necesito de la funcion
        return array($historial_pagos, $expediente, $balance);
    }

}

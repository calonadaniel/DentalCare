<?php

namespace App\Http\Controllers;
use App\pagos;
use App\expediente;
use Illuminate\Http\Request;

class PagosController extends Controller
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
        $expedientes = expediente::Orderby('nombre','asc')->get();
        /*$pagos['pagos'] = pagos::where('id_expediente', '>', 0)
                                                    ->Orderby('fecha','asc')
                                                    ->get();                                          
        dd($pagos->expediente->expediente_id)*/;
        
        return view('pagos', compact('expedientes'));
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
        $registro_pago = array(     
            'id_expediente'=>$request->input($action.'_id_expedienteselected'),
            'id_pago'=> $request->input($action.'_id_pago'),
            'cuota'=> $request->input($action.'_cuota')?: '0',
            'saldo'=> $request->input($action.'_saldo')?: '0',
            'fecha' => $request->input($action.'_fecha')?: now(),
            'detalles'=> $request->input($action.'_detalles')?: '',
            );
        pagos::create($registro_pago);
        return redirect()->route('pagos.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function show(pagos $pagos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function edit(pagos $pagos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pagos $pagos)
    {
       /* pagos::findorFail($request->expediente_id)->update($expedientes);
        return redirect()->route('expediente.index');*/
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(pagos $pagos)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\fotos;
use App\expediente;
use Illuminate\Http\Request;

class FotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id_expediente)
    {
        $fotos = fotos::where('id_expediente', $id_expediente)
                        ->OrderBy('created_at','asc')
                        ->get();

        $expediente = expediente::find($id_expediente);
        //dd($fotos);
        return view('fotos', compact('expediente','fotos'));
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
        $id_expediente = $request->id_expediente;
        
        $image = $request->file('file');
            //$imageName = $image->getClientOriginalName();
            $imageName = preg_replace('/\s+/', '', $image->getClientOriginalName());

            $path = public_path('images/'.$id_expediente);

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $image->move($path, $imageName);
            
            $fotos = array(     
                'id_expediente' => $id_expediente,
                'nombre'=>$imageName,
                'detalles'=>$request->detalles ?: '',
            );
            fotos::create($fotos);
            return response()->json(['success' => $imageName]);

            //return redirect()->route('fotos.index',$id_expediente);
        /*$imageUpload = new Fotos();
        $imageUpload->nombre = $imageName;
        $imageUpload->id_expediente = $id_expediente;
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
        return view('fotos.index', $id_expediente);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function show(fotos $fotos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function edit(fotos $fotos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fotos $fotos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fotos  $fotos 
     * @return \Illuminate\Http\Response
     */


    public function destroy2(Request $request, $ruta, $fotos)
    {
        Fotos::where('nombre', $nombre)->delete();
        /*$path = public_path() . '/images/' . $filename;*/
        $path = public_path() .$ruta;
        if (file_exists($path)) {
            unlink($path);
        }
        return redirect()->route('fotos.index',$id_expediente);
    }

    public function destroy(Request $request )
    {
        $filename = $request->get('filename');
        $id_expediente = Fotos::where('nombre', $filename)->value('id_expediente');
        Fotos::where('nombre', $filename)->delete();
        $path = public_path() ."/images/".$id_expediente."/".$filename;
        /*  echo "<pre>";print_r($borrar); die;*/
        if (file_exists($path)) {
            unlink($path);
        }
        //return redirect()->route('fotos.index',$id_expediente);
        return $filename;
    }
}

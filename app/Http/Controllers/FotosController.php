<?php

namespace App\Http\Controllers;

use App\fotos;
use App\expediente;
use Illuminate\Http\Request;
use Image;
use File;
class FotosController extends Controller
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
        request()->validate([
            'id_expediente' => 'required|integer',
            'file' => 'required|image|max:10240',
        ]);

        $id_expediente = $request->id_expediente;
        
        $image = $request->file('file');
            //$imageName = $image->getClientOriginalName();
        $imageName = preg_replace('/\s+/', '', $image->getClientOriginalName());

        $path = public_path('images/'.$id_expediente);

        /*if (!file_exists($path)) {
            mkdir($path, 0777, true);
        } */
        if (!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }

        $width = 1280; // your max width
        $height = 1280; // your max height
        $img = Image::make($image);
        $img->orientate();
        $img->height() > $img->width() ? $width=null : $height=null;
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        //$img->move($path, $imageName);
        $img->save($path.'/'.$imageName, 70);
            
        $fotos = array(     
            'id_expediente' => $id_expediente,
            'nombre'=>$imageName,
            'detalles'=>$request->detalles ?: '',
        );

        fotos::create($fotos);
        return response()->json(['success' => $imageName]);
        //Using TinyJPG-PNG php library. Max of 500 per month.
        /*$filepath = public_path('images/'.$id_expediente.'/'.$imageName);
        try {
            \Tinify\setKey("6mZ6WX7KMbdFF7LWrnHP4bXTLlrXML8L"); // Alternatively, you can store your key in .env file.
            $source = \Tinify\fromFile($filepath);
            $source->toFile($filepath);
        } catch(\Tinify\AccountException $e) {
            // Verify your API key and account limit.
            return redirect()->route('fotos.index',$id_expediente)->with('error', $e->getMessage());
        } catch(\Tinify\ClientException $e) {
            // Check your source image and request options.
            return redirect()->route('fotos.index',$id_expediente)->with('error', $e->getMessage());
        } catch(\Tinify\ServerException $e) {
            // Temporary issue with the Tinify API.
            return redirect()->route('fotos.index',$id_expediente)->with('error', $e->getMessage());
        } catch(\Tinify\ConnectionException $e) {
            // A network connection error occurred.
            return redirect()->route('fotos.index',$id_expediente)->with('error', $e->getMessage());
        } catch(Exception $e) {
            // Something else went wrong, unrelated to the Tinify API.
            return redirect()->route('fotos.index',$id_expediente)->with('error', $e->getMessage());
        } */
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

    public function destroy(Request $request )
    {
        request()->validate([
            'filename' =>'required|string'
        ]);
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

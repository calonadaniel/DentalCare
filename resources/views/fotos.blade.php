@extends('components.template')

@section('content')

<div class="section">
    <div class="container">
        <div class="row my-3 d-flex justify-content-center">
          <h2 class="paciente-pago">{{$expediente->nombre}} {{$expediente->apellido}}</h2>
        </div>
      {{--  <div class="row d-flex justify-content-center mt-2">
              <i class="fas fa-trash fa-2x" type="button" href="{{route('fotos.destroy')}}" id="btn_del"></i>
        </div> --}}
        <div class="row d-flex justify-content-center mt-2"> 
          <i class="fas fa-plus-circle fa-2x mb-3 " data-toggle="modal" data-target="#Modal-fotos-add"></i>
          <i class="pl-3 fas fa-trash-alt fa-2x" type="button" href="{{route('fotos.destroy')}}" id="btn_del"></i>
        </div>
    </div>
</div>

<div class="section">
  <div class="container-fluid">
    <div id="nanogallery2"
          {{--data-nanogallery2='{
      "thumbnailWidth": "auto",
      "thumbnailBorderVertical": 0,
      "thumbnailBorderHorizontal": 0,
      "thumbnailDisplayTransition": "slideUp",
      "thumbnailLabel": {
        "display": false
      },
      "thumbnailHoverEffect2": "toolsAppear|labelSlideUp|imageScale150",
      "thumbnailAlignment": "center"
    }'--}}>
                  <!-- gallery content -->
                  @foreach ($fotos as $fotos)
                  @php
                      $nombre = $fotos->nombre;
                      $ruta = "/images/$fotos->id_expediente/$fotos->nombre";
                  @endphp
                  
                  <a href = {{$ruta}}  data-ngThumb = {{$ruta}} data-ngcustomData={{ $fotos->nombre }}></a>

                  @endforeach
    </div>
  </div>
</div>
{{--<div class="section">
  <div class="container">
    <div id="nanogallery2"
    {{--data-nanogallery2='{
      "thumbnailWidth": "auto",
      "thumbnailBorderVertical": 0,
      "thumbnailBorderHorizontal": 0,
      "thumbnailDisplayTransition": "slideUp",
      "thumbnailLabel": {
        "display": false
      },
      "thumbnailHoverEffect2": "toolsAppear|labelSlideUp|imageScale150",
      "thumbnailAlignment": "center"
    }'>
                  <!-- gallery content -->
                  @foreach ($fotos as $fotos)
                  @php
                      $nombre = $fotos->nombre;
                      $ruta = "/images/$fotos->id_expediente/$fotos->nombre";
                  @endphp
                  
                  <a href = {{$ruta}}  data-ngThumb = {{$ruta}} data-ngcustomData={{ $fotos->nombre }}></a>

                  @endforeach
  </div>
</div> --}}

<!-- Modal para agregar fotos-->
<div class="modal fade left" id="Modal-fotos-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Imagenes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> 
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('fotos.store')}}" enctype="multipart/form-data"
            class="dropzone text-center" id="dropzone">
            @csrf
                <input type="hidden" id="id_expediente" name="id_expediente" value="{{$expediente->id_expediente}}">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button data-id_expediente="{{$expediente->id_expediente}}" type="submit" id="btn_submitimages" class="btn btn-guardar">Guardar Fotos</button> 
        </div>
      </div>
    </div>
  </div>

@endsection
  {{--Campos que no se muestran en el modal--}}
  <input type="hidden" name="{{$action}}_id_resumen" id="{{$action}}_id_resumen">
  <input type="hidden" name="{{$action}}_id_expediente" id="{{$action}}_id_expediente" value="{{$id_expediente ?? ''}}">
    
  <div class="form-row">
    <label for="fecha">Fecha:</label>
    <input type="date" class="form-control" name="{{$action}}_fecha" id="{{$action}}_fecha" placeholder="" data-parsley-required>
  </div>
  
  <div class="form-row pt-2">
    <label for="detalles">Detalles:</label>
    <input type="text" class="form-control" name="{{$action}}_detalles" id="{{$action}}_detalles" placeholder="..." data-parsley-required>
  </div>

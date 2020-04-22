
   {{--campos que no se muestran en el modal---}} 
   <input type="hidden" name="{{$action}}_fecha" id="{{$action}}_fecha" value="{{now()}}">
   <input type="hidden" name="{{$action}}_id_pago" id="{{$action}}_id_pago" value="{{$id_pago ?? ''}}">
   <input type="hidden" name="{{$action}}_id_expediente" id="{{$action}}_id_expediente" value="{{$id_expediente ?? ''}}">
   <input type="hidden" name="{{$action}}_saldo" id="{{$action}}_saldo" value="{{$saldo ?? '0'}}" >

    <div class="form-row">
        <label for="cuota">Cantidad de la cuota:</label>
        <input class="form-control" name="{{$action}}_cuota" id="{{$action}}_cuota" placeholder="L. 0.00" data-parsley-type="number" data-parsley-maxlength="6" data-parsley-required>
    </div>
    
    <div class="form-row pt-2">
        <label for="detalles">Detalles(Opcional):</label>
        <input type="text" class="form-control" name="{{$action}}_detalles" id="{{$action}}_detalles" placeholder="..."data-parsley-required="false" >
    </div>
       



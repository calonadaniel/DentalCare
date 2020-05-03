@extends('components.template')

@section('content')

<div class="section">         
    <div class="container">
        <div class="row my-3 d-flex justify-content-center">
            <h2 class="paciente-pago">{{$expediente->nombre}} {{$expediente->apellido}}</h2>
        </div>
        <div class="row">
            <h5 class="costo-tratamiento font-weight-bold">Resumen:</h5>
        </div>
        <div class="row ">
            <h5 class="costo-tratamiento">Costo del Tratamiento: L. {{$expediente->costo_tratamiento}}</h5>
        </div>
        <div class="row ">
            <h5 class="prima-inicial">Prima Inicial: L. {{$expediente->prima_inicial}}</h5>
        </div>
        <div class="row ">
        <h5 class="saldo">Saldo: L. {{$balance}}</h5>
        </div>
        <div class="row">
           {{--<div >
            <h4>Valor del Tratamiento: {{$expediente->costo_tratamiento}} </h4>
            <h4>Prima Inicial: {{$expediente->prima_inicial}} </h4>
            </div> --}}
            <div class="d-flex justify-content-start my-2">
              <i href="#" class="fas fa-money-check-alt fa-2x " data-toggle="modal" data-target="#Modal-pago-add"></i>
              <a class="fas fa-file-export fa-2x ml-4" 
              href="{{action('HistorialpagosController@pdf', $expediente->id_expediente)}}" 
              role="button" target="_blank"></a>
           </div>
        </div>
         {{--}}  <div class="row">
              <a class="btn btn-block mt-2 fas fa-history fa-1x" 
              href="{{action('HistorialpagosController@pdf', $expediente->id_expediente)}}" 
              role="button" target="_blank"></a>
            </div> --}}
            <div class="row">
                <table class="table table-sm table-bordered table-hover" >
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cuota</th>
                        <th scope="col" class="text-center">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 0;
                        @endphp
        
                    @foreach ($historial_pagos as $registros)
                      <tr>
                        <th scope="row">{{++$num}}</th>
                        <td>{{$registros->fecha}}</td>
                        <td>L. {{$registros->cuota}}</td>
                        <td class="text-center">
                
                            {{--Editar informacion del pago--}}
                            <i href="#"  class="far fa-edit" 
                            data-toggle="modal" 
                            data-target="#Modal-pago-edit"
                            @include('components.pagos.pagosdata')
                            ></i>
                
                            {{--Borrar el pago--}}
                            <i href="#"  class="fas fa-trash-alt" 
                            data-toggle="modal" 
                            data-target="#Modal-pago-delete"
                            data-id_pago="{{$registros->id_pago}}"
                            data-id_expediente="{{$expediente->id_expediente}}"
                            ></i>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar un nuevo registro de pago-->
<div class="modal fade left" id="Modal-pago-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro de Pago</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @php
              $action = "add";
          @endphp
          <form action="{{route('historialpagos.store')}}" id="pagosform-{{$action}}" method="post">
            @csrf
            
            @include('components.pagos.pagosform',['action'=>$action,'id_expediente'=>$expediente->id_expediente])
 
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-guardar">Registrar Pago</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<!---Modal para editar registro de pago---->
<div class="modal fade left" id="Modal-pago-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Registro de Pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @php
            $action = "edit";
        @endphp
        <form action="{{route('historialpagos.update')}}" id="pagosform-{{$action}}" method="post">
          @csrf
          @method('PUT')

          @include('components.pagos.pagosform',['action'=>$action,'id_expediente'=>$expediente->id_expediente, 'id_pago'=>$expediente->id_pago])

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-guardar" >Actualizar Pago</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
  
<!-- Modal para borrar el pago-->
<div class="modal fade left" id="Modal-pago-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrar Registro de Pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @php
            $action = "delete";
        @endphp
        <form action="{{route('historialpagos.destroy')}}" id="pagosform-{{$action}}" method="post">
          @csrf
          @method('DELETE')
              <div>
                  <input type="hidden" name="{{$action}}_id_expediente" id="{{$action}}_id_expediente">
                  <input type="hidden" name="{{$action}}_id_pago" id="{{$action}}_id_pago">
                  <p>¿Esta seguro que desea borrar el registro de pago?</p>
                  <p class="font-weight-bold text-black">Esta operación no puede deshacerse.</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-borrar">Borrar</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>

@endsection
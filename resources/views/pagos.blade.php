@extends('components.template')
@section('content')

<section>
  <div class="container">
    <div class="row my-3 d-flex justify-content-center ml-5">
      <i class="fas fa-search fa-2x " aria-hidden="true"></i>
      <input style="border:none;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Pagos..." >
    </div>
    <div class="row d-flex justify-content-start">
        <i class="fas fa-money-check-alt fa-2x mb-2 " data-toggle="modal" data-target="#Modal-pago-add"></i>
    </div>
    <div class="row">
      <table class="table table-bordered table-sm table-hover" id="myTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col" class="text-center">Ver Historial</th>
          </tr>
        </thead>
        <tbody>
          @php
          $num = 0;
          @endphp
          @foreach($expedientes as $pacientes)
          <tr>
            <th scope="row">{{++$num}}</th>
            <td>{{$pacientes->nombre}}</td>
            <td>{{$pacientes->apellido}}</td>
            <td>
                {{--Ver detalles del plan de pago
                <a href=""  class="btn btn-success btn-sm text-center" 
                data-toggle="modal" 
                data-target="#exampleModal-showpagos"
                data-id_expediente="{{$pacientes->id_expediente}}"
                data-prima_inicial="{{$pacientes->prima_inicial}}"
                data-costo_tratamiento="{{$pacientes->costo_tratamiento}}"
                >Consultar Historial de pagos</a> --}}
                <a class="btn btn-block mt-2 fas fa-history fa-1x" 
                href="pagos-{{$pacientes->id_expediente}}" 
                role="button"></a>
            </td>       
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>

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
        <form action="{{route('pagos.store')}}" id="pagosform-{{$action}}" method="post">
          @csrf
          <div class="form-row pb-2">
            <label for="{{$action}}_id_paciente">Seleccione Paciente</label>
            <select class="form-control" name="{{$action}}_id_expedienteselected" id="{{$action}}_id_expedienteselected" data-parsley-required >
              @foreach ($expedientes as $lista_pacientes)
            <option value="{{$lista_pacientes->id_expediente}}">{{$lista_pacientes->nombre}} {{$lista_pacientes->apellido}} </option>   
              @endforeach
            </select>
          </div>

          @include('components.pagos.pagosform',['action'=>$action])

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-guardar">Registrar Pago</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
 
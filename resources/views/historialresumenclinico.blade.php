@extends('components.template')
@section('content')

<div class="section">
    <div class="container">
        <div class="row my-3 d-flex justify-content-center">
            <h2 class="paciente-pago">{{$expediente->nombre}} {{$expediente->apellido}}</h2>
        </div>
        <div class="row d-flex justify-content-center">
            <i class="fas fa-file-medical fa-2x mb-3 " data-toggle="modal" data-target="#Modal-resumenclinico-add"></i>
        </div>
        <div class="row">
            @foreach($resumenclinico as $resumenclinico)
            <div class="card  mb-3 text-dark col-sm-12 col-md-6 col-lg-6" >
                <div class="card-header font-weight-bold">{{$resumenclinico->fecha}}</div>
                <div class="card-body">
                   {{-- <h5 class="card-title">Primary card title</h5> --}}
                    <p class="card-text ">{{$resumenclinico->detalles}}</p>

                    <i href="#" class="far fa-edit" 
                    data-toggle="modal" 
                    data-target="#Modal-resumenclinico-edit"
              
                    @include('components.resumenclinico.resumenclinicodata')
                
                    ></i>
        
                    {{--Borrar el resumen--}}
                    <i href="#"  class="fas fa-trash-alt" 
                    data-toggle="modal" 
                    data-target="#Modal-resumenclinico-delete"
                    data-id_resumen ="{{$resumenclinico->id_resumen}}"
                    data-id_expediente="{{$expediente->id_expediente}}"
                    ></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal para agregar un nuevo registro clinico-->
<div class="modal fade left" id="Modal-resumenclinico-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo registro clínico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
        <div class="modal-body">
          @php
              $action = "add"
          @endphp
          <form action="{{route('historialresumenclinico.store')}}" id="resumenclinicoform-{{$action}}" method="post">
            @csrf
            
            @include('components.resumenclinico.resumenclinicoform',['action' => $action, 'id_expediente' =>$expediente->id_expediente])

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-guardar">Guardar </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

  {{--Modal para editar registro clinico--}}
<div class="modal fade left" id="Modal-resumenclinico-edit" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"> 
          <h5 class="modal-title">Editar Registro Clínico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @php
              $action = "edit";
              $id_expediente = $expediente->id_expediente;
          @endphp
          <form action="{{route('historialresumenclinico.update')}}" id="resumenclinicoform-{{$action}}" method="post">
              @csrf
              @method('PUT')
              @include('components.resumenclinico.resumenclinicoform',['action' => $action, 'id_expediente' => $id_expediente])

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-guardar" >Actualizar Registro</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal para borrar registro clinico-->
<div class="modal fade left" id="Modal-resumenclinico-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrar registro clínico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            {{--<hr style="height:8px;border-top:8px solid #f00"/>--}}
            @php
              $action = "delete";
            @endphp
            <form action="{{route('historialresumenclinico.destroy')}}" id="resumenclinicoform-{{$action}}" method="post">
            @csrf
            @method('DELETE')
                <div>
                  <input type="hidden" id="{{$action}}_id_expediente" name="delete_id_expediente">
                  <input type="hidden" id="{{$action}}_id_resumen" name="delete_id_resumen">
                  <p>¿Esta seguro que desea borrar el registro clínico?</p>
                  <p class="font-weight-bold text-black">Esta operación no puede deshacerse.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-borrar">Borrar</button>
                </div>
            </form>
            {{--<hr style="height:8px;border-top:8px solid #f00"/>--}}
        </div>
    </div>
    </div>
</div>
    
@endsection
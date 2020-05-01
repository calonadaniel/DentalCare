@extends('components.template')
@section('content')

<section>
    <div class="container">
      @include('components.searchbar',['placeholder'=> "Buscar Resumen Clinico..."])
      <div class="row d-flex justify-content-start">
          <i href="#" class="fas fa-file-medical fa-2x mb-2 " data-toggle="modal" data-target="#Modal-resumenclinico-add"></i>
      </div>
      <div class="row">
        <table class="table table-bordered table-sm table-hover" id="myTable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col" class="text-center">Ver Resumen</th>
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
              <td class="text-center">
                  <a class="fas fa-list-ul fa-1x" 
                  href="resumenclinico-{{$pacientes->id_expediente}}" 
                  role="button"></a>
              </td>       
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</section>

<!-- Modal para agregar un nuevo resumen clinico-->
<div class="modal fade left" id="Modal-resumenclinico-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Resumen Clínico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @php
          $action = "add"
          @endphp
          <form action="{{route('resumenclinico.store')}}" id="resumenclinicoform-{{$action}}" method="post">
            @csrf
            <div class="form-row pb-2">
              <label for="id_paciente">Seleccione Paciente</label>
              <select class="form-control" name="{{$action}}_id_expedienteselected" id="{{$action}}_id_expedienteselected"  data-parsley-required>
                @foreach ($expedientes as $lista_pacientes)
              <option value="{{$lista_pacientes->id_expediente}}">{{$lista_pacientes->nombre}} {{$lista_pacientes->apellido}} </option>   
                @endforeach
              </select>
            </div>

            @include('components.resumenclinico.resumenclinicoform',['action' => $action])

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-guardar">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
    
@endsection
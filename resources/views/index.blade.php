@extends('components.template')
@section('content')

    <div class="section" >
        <div class="container">
            @include('components.searchbar',['placeholder'=> "Expediente..."])
            <div class="row d-flex justify-content-start">
                <i href="#"class="fas fa-user-plus fa-2x mb-2 " data-toggle="modal" data-target="#Modal-add"></i>
            </div>
            <div class="row">
                <table class="table table-bordered table-sm table-hover" id="myTable">
                    <thead>
                    <tr >
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col" class="text-center">Fotos</th>
                        <th scope="col" class="text-center">Expediente</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 0;
                        @endphp
        
                    @foreach ($expedientes as $expedientes)
                    <tr>
                        <th scope="row">{{++$num}}</th>
                        <td>{{$expedientes->nombre}}</td>
                        <td>{{$expedientes->apellido}}</td>
                        <td class="text-center"> 
                            <a class="fas fa-camera fa-1x pr-2" 
                            href="fotos-{{$expedientes->id_expediente}}" 
                            role="button"></a>
                        </td>
                        <td class="text-center">

                            {{--Ver informacion del expediente--}}
                            <i
                            href="#"  
                            class="fas fa-eye"                     
                            data-toggle="modal" 
                            data-target="#Modal-show" 
                            data-target="#Modal-edit"
                            @include('components.expediente.expedientedata',['expedientes' => $expedientes])
                            ></i>
            
                            {{--Editar informacion del expediente--}}
                            <i 
                            href="#"
                            class="far fa-edit"
                            data-toggle="modal" 
                            data-target="#Modal-edit"
                            @include('components.expediente.expedientedata',['expedientes' => $expedientes])
                            ></i>
                
                            {{--Borrar el expediente--}}
                            <i href="#"  
                            class="fas fa-trash-alt" 
                            data-toggle="modal" 
                            data-target="#Modal-delete"
                            data-id_expediente="{{$expedientes->id_expediente}}"
                            ></i>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal para  agregar un nuevo expediente-->
    <div class="modal fade left" id="Modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Paciente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @php
                $action ="add";
                @endphp
                <form action="{{route('expediente.store')}}" id="expedienteform-{{$action}}" method="post">
                @csrf
                   @include('components.expediente.expedienteform',['action' => $action])
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                        <button type="submit" class=" btn btn-guardar ">Guardar Paciente</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal para ver la informacion del expediente -->
    <div class="modal fade left" id="Modal-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ver Expediente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form  {{--action="{{route('expediente.show','id_expediente')}}" method="GET" --}}>
                     @csrf
                    @php
                        $action ="show";
                    @endphp
                    @include('components.expediente.expedienteform',['action' => $action])

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="show-dismiss" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>

            </div>
        </div>
        </div>
    </div> 

    <!-- Modal para editar/actualizar la informacion del expediente -->
    <div class="modal fade left" id="Modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Expediente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @php
                $action = "edit";
                 @endphp
                <form action="{{route('expediente.update','edit_id_expediente')}}" id="expedienteform-{{$action}}" method="post">
                    @csrf
                    @method('PUT')
                    @include('components.expediente.expedienteform',['action' => $action])
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-guardar ">Actualizar Datos</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div> 

    <!-- Modal para borrar el expediente-->
    <div class="modal fade left" id="Modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Borrar Expediente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('expediente.destroy','delete_id_expediente')}}" method="post">
                @csrf
                @method('DELETE')
                    <div>
                        <input type="hidden" id="delete_id_expediente" name="delete_id_expediente">
                        <p>¿Esta seguro que desea borrar el expediente?</p>
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

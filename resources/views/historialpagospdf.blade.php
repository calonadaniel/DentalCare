<!DOCTYPE html>
<html lang="es">
    <head>
        @include('components.head')
        @include('components.styles')
    </head>
    <body>
        {{--@include('components.navbar') --}}
        
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
                    {{--<div >
                    <h4>Valor del Tratamiento: {{$expediente->costo_tratamiento}} </h4>
                    <h4>Prima Inicial: {{$expediente->prima_inicial}} </h4>
                    </div> 
                    <div class="row d-flex justify-content-start mt-2">
                        <i class="fas fa-money-check-alt fa-2x mb-2 " data-toggle="modal" data-target="#Modal-addregistrodepago"></i>
                    </div>
                    <div class="row">
                    <a class="btn btn-block mt-2 fas fa-history fa-1x" 
                    href="{{action('HistorialpagosController@pdf', $expediente->id_expediente)}}" 
                    role="button" target="_blank"></a>
                    </div> --}}
                    <div class="row">
                        <table class="table table-sm table-bordered " >
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Cuota</th>
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
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{--@include('components.footer')--}}


        {{--@include('components.scripts'--}}
    </body>
</html>


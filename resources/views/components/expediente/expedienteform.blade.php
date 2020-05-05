
   {{--campos que no se muestran en el modal---}}
   <input type="hidden" name="{{$action}}_id_expediente" id="{{$action}}_id_expediente">

    {{--Nombre, apellido, edad--}}
    <div class="form-row ">
        <div class="col">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control"  name="{{$action}}_nombre" id="{{$action}}_nombre" placeholder="" data-parsley-required>
        </div>
        <div class="col">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" name="{{$action}}_apellido" id="{{$action}}_apellido"  placeholder="" data-parsley-required>
        </div>
        <div class="col">
            <div class="col">
                <label for="edad">Edad:</label>
                <input type="number" class="form-control" name="{{$action}}_edad" id="{{$action}}_edad" placeholder="" data-parsley-type="number" data-parsley-maxlength="3" data-parsley-required>
            </div>
        </div>
    </div>
    {{--Costo y prima--}}
    <div class="form-row pt-2">
        <div class="col">
            <label for="costo_tratamiento">Costo:</label>
            <input class="form-control" name="{{$action}}_costo_tratamiento" id="{{$action}}_costo_tratamiento" placeholder="" data-parsley-type="number" data-parsley-maxlength="6" data-parsley-required>
        </div>
        <div class="col">
            <label for="prima_inicial">Prima Inicial:</label>
            <input class="form-control" name="{{$action}}_prima_inicial" id="{{$action}}_prima_inicial" placeholder="" data-parsley-type="number" data-parsley-maxlength="6" data-parsley-required>
        </div>
    </div>
    {{--Adulto encargado--}}
    <div class="form-row pt-2">
        <div class="col">
            <label for="encargado">Nombre del adulto encargado:</label>
            <input type="text" class="form-control" name="{{$action}}_encargado" id="{{$action}}_encargado" placeholder="" data-parsley-required="false">
        </div>
    </div>
    {{---direccion---}}
    <div class="form-row pt-2">
        <div class="col">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" name="{{$action}}_direccion" id="{{$action}}_direccion"  placeholder="" data-parsley-required="false">
        </div>
    </div>
    <div class="form-row pt-2">
    </div>
    {{--telefono,Sexo,Fecha--}}
    <div class="form-row pt-2">
        <div class="col">
            <label for="telefono">Teléfono:</label>
            <input  class="form-control" name="{{$action}}_telefono" id="{{$action}}_telefono"  placeholder="+504" data-parsley-minlength="8" data-parsley-type="number" data-parsley-maxlength="8" data-parsley-minlength="8" data-parsley-required>
        </div>
        <div class="col">
            <label for="sexo">Sexo:</label>
            <select class="form-control" name="{{$action}}_sexo" id="{{$action}}_sexo" required="" >
                <option>Masculino</option>
                <option>Femenino</option>
                <option>Otro</option>
            </select>
        </div>
        <div class="col">
            <label for="fecha_inicio">Fecha:</label>
            <input type="date" class="form-control" name="{{$action}}_fecha_inicio" id="{{$action}}_fecha_inicio" placeholder="" data-parsley-required>
        </div>
    </div> 
    {{--Higiene,cariogencia,habitos--}}    
    <div class="form-row pt-2">
        <div class="col">
            <label for="higiene">Higiene:</label>
            <select class="form-control" name="{{$action}}_higiene" id="{{$action}}_higiene" data-parsley-required>
                <option>Buena</option>
                <option>Regular</option>
                <option>Mala</option>
            </select>
        </div>
        <div class="col">
            <label for="actividadcariogenica">Cariogénica</label>
            <select class="form-control" name="{{$action}}_actividad_cariogenica" id="{{$action}}_actividad_cariogenica" required="">
                <option>Baja</option>
                <option>Alta</option>
            </select>
        </div>
        <div class="col">
            <label for="habitos">Hábitos </label>
            <select class="form-control" name="{{$action}}_habitos" id="{{$action}}_habitos" required="">
                <option>Succión </option>
                <option>Deglución Atípica</option>
                <option>Respirador Bucal</option>
            </select>
        </div>
    </div>
    {{--Inicio dentadura permanente--}}
    <div class="form-group">
        <p class="text-center pt-4 font-weight-bold">Dentición Permanente</p>
        <div class="row text-center">
            <div class="col">
                <p class="my-0">Superior Izquierda</p>
                @for ($i = 8; $i > 0; $i--)
                <div class="form-check form-check-inline round">
                    <input class="form-check-input" type="checkbox"  name="{{$action}}_dentpersuperiorizquierda[]" id="{{$action}}_dentpersuperiorizquierda{{$i}}" value="{{$i}}" data-parsley-required="false">
                    <label class="form-check-label" for="{{$action}}_dentpersuperiorizquierda{{$i}}">{{$i}}</label>
                </div>
                @endfor
            </div>
            <div class="col">
                <p class="my-0">Superior Derecha</p>
                @for ($j = 1; $j < 9; $j++)
                <div class="form-check form-check-inline round">
                    <input class="form-check-input" type="checkbox" name="{{$action}}_dentpersuperiorderecha[]" id="{{$action}}_dentpersuperiorderecha{{$j}}" value="{{$j}}" data-parsley-required="false">
                    <label class="form-check-label" for="{{$action}}_dentpersuperiorderecha{{$j}}">{{$j}}</label>
                </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row pt-4 text-center">
            <div class="col">
                <p class="my-0">Inferior Izquierda</p>
                @for ($i = 8; $i > 0; $i--)
                <div class="form-check form-check-inline round">
                    <input class="form-check-input" type="checkbox"  name="{{$action}}_dentperinferiorizquierda[]" id="{{$action}}_dentperinferiorizquierda{{$i}}" value="{{$i}}" data-parsley-required="false">
                    <label class="form-check-label" for="{{$action}}_dentperinferiorizquierda{{$i}}">{{$i}}</label>
                </div>
                @endfor
            </div>
            <div class="col">
                <p class="my-0">Inferior Derecha</p>
                @for ($j = 1; $j < 9; $j++)
                <div class="form-check form-check-inline round">
                    <input class="form-check-input" type="checkbox"  name="{{$action}}_dentperinferiorderecha[]" id="{{$action}}_dentperinferiorderecha{{$j}}" value="{{$j}}" data-parsley-required="false">
                    <label class="form-check-label" for="{{$action}}_dentperinferiorderecha{{$j}}">{{$j}}</label>
                </div>
                @endfor
            </div>
        </div>
    </div>
    {{--Fin dentadura permanente--}}

    {{--Dentadura temporal--}}
    @php
        $dentaltemporal = array("A", "B", "C", "D","E");
        $dentaltemporalinv= array_reverse($dentaltemporal);
    @endphp
    <div class="form-group">
        <p class="text-center pt-4 font-weight-bold">Dentición Temporal</p>
        <div class="row text-center">
            <div class="col">
                <p class="my-0">Superior Izquierda</p>
                @foreach ($dentaltemporalinv as &$value)
                <div class="form-check form-check-inline round">
                    <input class="form-check-input" type="checkbox" name="{{$action}}_denttemsuperiorizquierda[]" id="{{$action}}_denttemsuperiorizquierda{{$value}}" value="{{$value}}" data-parsley-required="false">
                    <label class="form-check-label" for="{{$action}}_denttemsuperiorizquierda{{$value}}">{{$value}}</label>
                </div>
                @endforeach
            </div>
            <div class="col">
                <p class="my-0">Superior Derecha</p>
                @foreach ($dentaltemporal as &$value)
                <div class="form-check form-check-inline round">
                    <input class="form-check-input" type="checkbox" name="{{$action}}_denttemsuperiorderecha[]" id="{{$action}}_denttemsuperiorderecha{{$value}}" value="{{$value}}" data-parsley-required="false">
                    <label class="form-check-label" for="{{$action}}_denttemsuperiorderecha{{$value}}">{{$value}}</label>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row pt-4 text-center">
            <div class="col">
                <p class="my-0">Inferior Izquierda</p>
                @foreach ($dentaltemporalinv as &$value)
                <div class="form-check form-check-inline round">
                    <input class="form-check-input" type="checkbox" name="{{$action}}_dentteminferiorizquierda[]" id="{{$action}}_dentteminferiorizquierda{{$value}}" value="{{$value}}" data-parsley-required="false">
                    <label class="form-check-label" for="{{$action}}_dentteminferiorizquierda{{$value}}">{{$value}}</label>
                </div>
                @endforeach
            </div>
            <div class="col">
                <p class="my-0">Inferior Derecha</p>
                @foreach ($dentaltemporal as &$value)
                <div class="form-check form-check-inline round">
                    <input class="form-check-input" type="checkbox" name="{{$action}}_dentteminferiorderecha[]" id="{{$action}}_dentteminferiorderecha{{$value}}" value="{{$value}}" data-parsley-required="false">
                    <label class="form-check-label" for="{{$action}}_dentteminferiorderecha{{$value}}">{{$value}}</label>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--Fin dentadura temporal--}}

    {{--Detalles de denticion--}}
    <div class="form-group">
        <p class="pt-4 font-weight-bold text-center ">Detalles Dentición</p>
        <div class="form-row">
            <div class="col">
                <div class="form-row">
                    <label for="extraccion_indicada">Extracciones indicadas</label>
                    <textarea class="form-control" name="{{$action}}_extraccion_indicada" id="{{$action}}_extraccion_indicada" rows="1" placeholder="..." data-parsley-required="false"></textarea>
                </div>
                <div class="form-row pt-2">
                    <label for="cirugia_impacto">Cirugias de Impacto</label>
                    <textarea class="form-control" name="{{$action}}_cirugia_impacto" id="{{$action}}_cirugia_impacto" rows="1" placeholder="..." data-parsley-required="false"></textarea>
                </div>
            </div>
            <div class="col align-self-center pl-5 pt-2">
                @php
                    $dent_detalles = array("Caries", "Perdidos", "Cuellos", "Radiografia","Dientes Incluidos","Supernumerarios");
                @endphp
                @foreach($dent_detalles as &$value)
                <div class="form-check">
                <input class="form-check-input largerCheckbox" type="checkbox"  name="{{$action}}_dentdetalles[]" id="{{$action}}_dentdetalles{{$value}}" value="{{$value}}" data-parsley-required="false">
                <label class="form-check-label pl-1" for="{{$action}}_dentdetalles{{$value}}">{{$value}}</label>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{--Arcada datos--}}
        <label class="font-weight-bold text-center ">Forma de la Arcada</label>
        <div class="form-row">
            <div class="col">
                <label for="arcada_superior">Arcada Superior</label>
                <select name="{{$action}}_arcada_superior" id="{{$action}}_arcada_superior"  class="form-control" data-parsley-required>
                    <option>Ovalada</option>
                    <option>Triangular</option>
                    <option>Cuadrada</option>
                </select>
            </div>
            <div class="col">
                <label for="arcada_inferior">Arcada Inferior</label>
                <select name="{{$action}}_arcada_inferior" id="{{$action}}_arcada_inferior"  class="form-control" required="">
                    <option>Ovalada</option>
                    <option>Triangular</option>
                    <option>Cuadrada</option>
                </select>
            </div>

        </div>


        {{--Tipo de mordia tiempo estimado de tratamiento--}}
    <div class="form-row pt-4">
        <div class="col">
            <label for="tipo_mordida">Tipo de mordida</label>
            <select name="{{$action}}_tipo_mordida" id="{{$action}}_tipo_mordida"  class="form-control" data-parsley-required>
                <option>Abierta</option>
                <option>Cruzada</option>
                <option>Apiñamiento</option>
                <option>Diastema</option>
                <option>Borde a Borde</option>
                <option>Diente Ectópico</option>
            </select>
        </div>
        <div class="col">
            <label for="duracion_tratamiento">Duración(Meses)</label>
            <input type="number" class="form-control"  name="{{$action}}_duracion_tratamiento" id="{{$action}}_duracion_tratamiento" placeholder="En meses" data-parsley-type="number" data-parsley-maxlength="2" data-parsley-required> 
        </div>
    </div>

    {{--Relacion molar--}}
    <div class="form-row pt-4 pl-2">
        <div class="col">
            <p class="font-weight-bold">Relación Molar</p>
            <div class="form-check">
                <input class="form-check-input largerCheckbox " type="checkbox"  name="{{$action}}_relacionmolar[]" id="{{$action}}_relacionmolarizquierdo" value="Izquierdo" >
                <label class="form-check-label" for="{{$action}}_relacionmolarizquierdo">Izquierdo</label>
            </div>
            <div class="form-check">
                <input class="form-check-input largerCheckbox" type="checkbox"  name="{{$action}}_relacionmolar[]" id="{{$action}}_relacionmolarderecho" value="Derecho">
                <label class="form-check-label" for="{{$action}}_relacionmolarderecho">Derecho</label>
            </div>
        </div>
        <div class="col">
            <p class="font-weight-bold">Relación Canino</p>
            <div class="form-check">
                <input class="form-check-input largerCheckbox" type="checkbox"  name="{{$action}}_relacioncanino[]" id="{{$action}}_relacioncaninoizquierdo" value="Izquierdo">
                <label class="form-check-label" for="{{$action}}_relacioncaninoizquierdo">Izquierdo</label>
            </div>
            <div class="form-check">
                <input class="form-check-input largerCheckbox" type="checkbox"  name="{{$action}}_relacioncanino[]" id="{{$action}}_relacioncaninoderecho" value="Derecho">
                <label class="form-check-label" for="{{$action}}_relacioncaninoderecho">Derecho</label>
            </div>
        </div>
    </div>

    {{--Antecedentes familiares--}}
    <div class="form-row pt-4">
        <label for="antecedente_familiar">Antecedentes Familiares</label>
        <textarea class="form-control" name="{{$action}}_antecedente_familiar" id="{{$action}}_antecedente_familiar" rows="3" placeholder="..." data-parsley-required="false"></textarea>
    </div>
data-id_expediente="{{$expedientes->id_expediente}}"
data-nombre="{{$expedientes->nombre}}"
data-apellido="{{$expedientes->apellido}}"
data-direccion="{{$expedientes->direccion}}"
data-prima_inicial="{{$expedientes->prima_inicial}}"
data-costo_tratamiento="{{$expedientes->costo_tratamiento}}"

data-edad="{{$expedientes->edad}}"
data-encargado="{{$expedientes->encargado}}"
data-telefono="{{$expedientes->telefono}}"
data-sexo="{{$expedientes->sexo}}"
data-fecha_inicio="{{$expedientes->fecha_inicio}}"
data-higiene="{{$expedientes->higiene}}"
data-actividad_cariogenica="{{$expedientes->actividad_cariogenica}}"
data-habitos="{{$expedientes->habitos}}"

data-dentpersuperiorizquierda="{{json_encode($expedientes->dentpersuperiorizquierda)}}" data-dentpersuperiorderecha="{{json_encode($expedientes->dentpersuperiorderecha)}}"
data-dentperinferiorizquierda="{{json_encode($expedientes->dentperinferiorizquierda)}}" data-dentperinferiorderecha="{{json_encode($expedientes->dentperinferiorderecha)}}"

data-denttemsuperiorizquierda="{{json_encode($expedientes->denttemsuperiorizquierda)}}" data-denttemsuperiorderecha="{{json_encode($expedientes->denttemsuperiorderecha)}}"
data-dentteminferiorizquierda="{{json_encode($expedientes->dentteminferiorizquierda)}}" data-dentteminferiorderecha="{{json_encode($expedientes->dentteminferiorderecha)}}"

data-extraccion_indicada="{{$expedientes->extraccion_indicada}}"
data-cirugia_impacto="{{$expedientes->cirugia_impacto}}"
data-dentdetalles="{{json_encode($expedientes->dentdetalles)}}"
data-arcada_superior="{{$expedientes->arcada_superior}}"
data-arcada_inferior="{{$expedientes->arcada_inferior}}"
data-tipo_mordida="{{$expedientes->tipo_mordida}}"
data-duracion_tratamiento="{{$expedientes->duracion_tratamiento}}"
data-relacionmolar="{{json_encode($expedientes->relacionmolar)}}"
data-relacioncanino="{{json_encode($expedientes->relacioncanino)}}"
data-antecedente_familiar="{{$expedientes->antecedente_familiar}}"






<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expediente extends Model
{
    Protected $fillable = ['nombre','apellido','direccion','costo_tratamiento','prima_inicial',
    'edad', 'encargado','telefono', 'sexo', 'fecha_inicio', 'higiene','actividad_cariogenica','habitos',
    //Denticion permanente
    'dentpersuperiorizquierda', 'dentpersuperiorderecha',
    'dentperinferiorizquierda', 'dentperinferiorderecha', 
    //Denticion termporal
    'denttemsuperiorizquierda', 'denttemsuperiorderecha',
    'dentteminferiorizquierda','dentteminferiorderecha',

    'extraccion_indicada',
    'cirugia_impacto',
    'dentdetalles',
    'arcada_superior',
    'arcada_inferior',
    'tipo_mordida',
    'duracion_tratamiento',
    'relacionmolar',
    'relacioncanino',
    'antecedente_familiar',
    ];

    Protected $primaryKey = "id_expediente";

    protected $casts = [
    //Denticion permanenente
    'dentpersuperiorizquierda'=>'array', 'dentpersuperiorderecha'=>'array',
    'dentperinferiorizquierda'=>'array', 'dentperinferiorderecha'=>'array',
    //Denticion temporal
    'denttemsuperiorizquierda'=>'array', 'denttemsuperiorderecha'=>'array',
    'dentteminferiorizquierda'=>'array', 'dentteminferiorderecha'=>'array',

    'dentdetalles' =>'array',
    'relacionmolar' =>'array',
    'relacioncanino' =>'array',
    ];

    //Las relaciones de la tala principal expediente con las demas
    public function pagos()
    {
        return $this->hasMany('App\pagos','id_expediente','id_expediente');
    }
    
    public function resumenclinico()
    {
        return $this->hasMany('App\resumenclinico','id_expediente','id_expediente');
    }
    
    public function fotos()
    {
        return $this->hasMany('App\fotos','id_expediente','id_expediente');
    }
}

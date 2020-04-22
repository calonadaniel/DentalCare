<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resumenclinico extends Model
{
    Protected $fillable = ['id_expediente','fecha','detalles'];

    Protected $primaryKey = "id_resumen";

    public function expediente() {
        return $this->belongsTo('App\expediente', 'id_expediente');
    }
}

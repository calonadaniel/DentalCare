<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotos extends Model
{
    Protected $fillable =  ['id_expediente', 'nombre', 'detalles'];
    Protected $primaryKey = "id_foto";

    public function expediente() {
        return $this->belongsTo('App\expediente', 'id_expediente');
    }

}

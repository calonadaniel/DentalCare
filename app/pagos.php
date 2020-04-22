<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
    Protected $fillable = ['id_expediente','fecha','cuota','saldo','detalles'];

    Protected $primaryKey = "id_pago";

    public function expediente() {
        return $this->belongsTo('App\expediente', 'id_expediente');
    }

}

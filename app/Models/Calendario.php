<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    //
    protected $table = "calendario";
    protected $fillable = ['id', 'fecha', 'id_vehiculo','id_conductor','orden_entrada','color','id_estado','comentario','origen','destino','fecha_salida','tipo_movimiento'];
    protected $dates = ['fecha'];
}

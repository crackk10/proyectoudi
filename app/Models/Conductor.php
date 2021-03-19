<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = "conductor";
    protected $fillable = ['id', 'nombre', 'apellido','tipo_documento','documento','tipo_licencia','id_estado_conductor','telefono','email','id_transportadora'];
}

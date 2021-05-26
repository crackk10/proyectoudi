<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $table = "detalle";
    protected $fillable = ['id', 'id_calendario','fecha','id_proceso','id_producto','peso'];
}

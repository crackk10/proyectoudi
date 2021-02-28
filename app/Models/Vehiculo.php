<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = "vehiculo";
    protected $fillable = ['id', 'id_transportadora', 'placa','remolque','capacidad',];
}

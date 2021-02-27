<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    protected $table = "transportadora";
    protected $fillable = ['id', 'razon_social', 'nit','telefono','email','id_estado','direccion'];
}

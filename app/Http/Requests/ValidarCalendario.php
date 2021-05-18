<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarCalendario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->tipo_usuario=2 &&  auth()->user()->id_estado=="1") {
            return true;
        }else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fecha'=>'required',
            'id_vehiculo'=>'required',
            'id_conductor'=>'required',
            'id_estado'=>'required',
            
        ];   
    }

    public function messages(){
        return [
            'fecha.required'=>'Se requiere la fecha de arribo',
            'id_vehiculo.required'=>'Se requiere la placa del vehiculo',
            'id_conductor.required'=>'Se requiere el nombre del conductor',
            'id_estado.required'=>'Se requiere el estado de evento',

            
        ];
    }
}

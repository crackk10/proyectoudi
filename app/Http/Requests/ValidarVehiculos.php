<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarVehiculos extends FormRequest
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
            'id_transportadora'=>'required|numeric',
            'placa'=>'required|max:10',
            'remolque'=>'required|max:30',
            'capacidad'=>'required|numeric',
       
            //
        ];
    }
    public function messages(){
        return [
            'id_transportadora.required'=>'El campo transportadora es obligatorio',
            'id_transportadora.numeric'=>'El campo transportadora solo soporta numeros',
            'placa.required'=>'El campo placa es obligatorio',
            'placa.max'=>'El campo placa soporta solo 10 caracteres',
            'remolque.required'=>'El campo remolque es obligatorio',
            'remolque.max'=>'El campo remolque soporta solo 10 caracteres',
            'capacidad.required'=>'El campo capacidad es obligatorio',
            'capacidad.numeric'=>'El campo capacidad solo soporta numeros',
           
        ];
    }
}

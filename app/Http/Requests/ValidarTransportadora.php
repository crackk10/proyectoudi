<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarTransportadora extends FormRequest
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
            'razon_social'=>'required|max:50',
            'nit'=>'required|numeric|max:999999999999999999999999999999',
            'telefono' => 'required|numeric|max:999999999999999',
            'id_estado' => 'required|numeric',
            //
        ];
    }
    public function messages(){
        return [
            'razon_social.required'=>'El campo Razon social es obligatorio',
            'razon_social.max'=>'El campo Razon social solo soporta 50 caracteres',
            'nit.required'=>'El campo nit es obligatorio',
            'nit.max'=>'El campo nit solo soporta 30 caracteres',
            'nit.numeric'=>'El campo nit solo soporta numeros',
            'telefono.required'=>'El campo telefono es obligatorio',
            'telefono.numeric'=>'El campo telefono solo soporta numeros',
            'telefono.max'=>'El campo telefono solo soporta 50 caracteres',
            'id_estado.required'=>'El campo estado es obligatorio',
            'id_estado.numeric'=>'El campo estado solo soporta numeros',
        ];
    }
}

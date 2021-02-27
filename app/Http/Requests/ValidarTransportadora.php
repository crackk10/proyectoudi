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
            'razon_social'=>'required',
            'nit'=>'required',
            'telefono' => 'required',
            'id_estado' => 'required',
            //
        ];
    }
    public function messages(){
        return [
            'razon_social.required'=>'El campo Razon social es obligatorio',
            'nit.required'=>'El campo nit es obligatorio',
            'telefono.required'=>'El campo telefono es obligatorio',
            'id_estado.required'=>'El campo estado es obligatorio',
        ];
    }
}

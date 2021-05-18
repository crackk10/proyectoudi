<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarConductores extends FormRequest
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
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'tipo_documento'=>'required|max:4',
            'documento'=>'required|max:999999999999999|numeric',
            'tipo_licencia'=>'required|max:10',
            'id_estado_conductor'=>'required',
            'telefono'=>'required|max:999999999999999|numeric',
            'id_transportadora' => 'required',
            //
        ];
    }
    public function messages(){
        return [
            'nombre.required'=>'El campo nombre es obligatorio',
            'nombre.max'=>'El campo nombre solo soporta 50 caracteres',
            'apellido.required'=>'El campo apellido es obligatorio',
            'apellido.max'=>'El campo apellido solo soporta 50 caracteres',
            'tipo_documento.required'=>'El campo tipo de documento es obligatorio',
            'tipo_documento.max'=>'El campo tipo de documento solo soporta 4 caracteres',
            'documento.required'=>'El campo  documento es obligatorio',
            'documento.max'=>'El campo documento solo soporta 15 caracteres',
            'documento.numeric'=>'El campo documento solo soporta caracteres numericos',
            'tipo_licencia.required'=>'El campo tipo de licencia es obligatorio',
            'tipo_licencia.max'=>'El campo tipo de licencia solo soporta 10 caracteres',
            'id_estado_conductor.required'=>'El campo Estado es obligatorio',
            'telefono.required'=>'El campo  telefono es obligatorio',
            'telefono.max'=>'El campo telefono solo soporta 15 caracteres',
            'telefono.numeric'=>'El campo telefono solo soporta caracteres numericos',
            'id_transportadora.required'=>'El campo transportadora valor es obligatorio',
            
        ];
    }
}

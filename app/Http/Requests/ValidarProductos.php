<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarProductos extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /* return true; */
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
            'nombre'=>'required|max:40',
            'valor'=>'required',
            'descripcion' => 'required|max200',
            //
        ];
    }
    public function messages(){
        return [
            'nombre.required'=>'El campo nombre es obligatorio',
            'nombre.max'=>'El campo nombre solo soporta 40 caracteres',
            'valor.required'=>'El campo valor es obligatorio',
            'descripcion.required'=>'El campo descripcion valor es obligatorio',
            'descripcion.required'=>'El campo descripcion solo soporta 200 caracteres',
        ];
    }
}

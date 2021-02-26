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
            'nombre'=>'required',
            'valor'=>'required',
            'descripcion' => 'required',
            //
        ];
    }
    public function messages(){
        return [
            'nombre.required'=>'El campo nombre es obligatorio',
            'valor.required'=>'El campo valor es obligatorio',
            'descripcion.required'=>'El campo descripcion valor es obligatorio',
        ];
    }
}

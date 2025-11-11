<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_tipo' => 'required',
            'descripcion' => 'required|max:255',
            'status' => 'required',
            'observacion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_tipo.required' => 'El campo id_tipo es obligatorio.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'descripcion.max' => 'El campo descripcion no debe exceder los 255 caracteres.',
            'status.required' => 'El campo status es obligatorio.',
            'observacion.required' => 'El campo observacion es obligatorio.',
        ];
    }
}

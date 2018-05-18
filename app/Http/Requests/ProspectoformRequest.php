<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProspectoformRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_persona' => 'required',
            'id_producto_interes' => 'required|exists:productos_interes,id',
            'rfc' => [
                'required',
                'regex:/^([A-ZÑ&]{3,4})?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))?([A-Z\d]{2})([A\d])$/'
            ],
            'id_estado_prospecto' => 'required|exists:estados_prospecto,id',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'nacionalidad' => 'required',
            'id_giro_mercantil' => 'required|exists:giros_mercantiles,id',
            'anyos_constitucion' => 'required',
            'telefono' => 'required|numeric',
            'extension' => 'numeric',
            'fax' => 'numeric',
            'celular' => 'required|numeric',
            'email' => 'email|nullable',
            'sitio_web' => 'url'
        ];
    }

    public function attributes(){
        return [
            'tipo_persona' => 'Tipo Persona',
            'id_producto_interes' => 'Producto de Interes',
            'rfc' => 'RFC',
            'apellido_materno' => 'Apellido Materno',
            'apellido_paterno' => 'Apellido Paterno',
            'nombre' => 'Nombre',
            'id_estado_prospecto' => 'Estado Prospecto',
        ];
    }
}

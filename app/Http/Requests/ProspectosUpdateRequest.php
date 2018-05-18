<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProspectosUpdateRequest extends FormRequest
{

    protected $errorBag = 'prospecto';

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
            'id_origen_prospecto' => 'required',
            'id_estado_prospecto' => 'required',
            'id_producto_interes' => 'required',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'email' => 'email|nullable',
            'id_prefijo' => 'required',
            'tipo_persona' => 'required'
        ];
    }

    public function attributes(){
        return [
            'id_origen_prospecto' => 'Origen Prospecto',
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

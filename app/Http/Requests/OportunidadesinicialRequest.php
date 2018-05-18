<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Oportunidades;

class OportunidadesinicialRequest extends FormRequest
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
            'tipo_registro' => [
                'required',
                Rule::in(array_keys(Oportunidades::$tipo_registros))
            ],
            'id_prospecto' => 'required|exists:prospectos,id'
        ];
    }
}

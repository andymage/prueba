<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Creditos;

class OportunidadRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'Oportunidad.nombre' => 'required',
            'Oportunidad.id_etapa' => 'required|exists:etapas,id',
            'Credito.tipo_credito' => [
                'required',
                Rule::in(array_keys(Creditos::$tipo_creditos))
            ],
        ];
    }

    public function attributes()
    {
        return [
            'Oportunidad.nombre' => 'Nombre de la Oportunidad',
            'Oportunidad.id_etapa' => 'Etapa',
            'Credito.tipo_credito' => 'Tipo de crédito'
        ];
    }

}

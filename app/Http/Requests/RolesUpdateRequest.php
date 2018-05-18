<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RolesUpdateRequest extends FormRequest
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
            'rol' => [
                'required',
                Rule::unique('rol')->ignore($request->get('id'))
            ],
            'descripcion' => 'required',
        ];
    }

    public function attributes() {
        return [
            'rol' => 'Rol',
            'descripcion' => 'Descripción'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PermisosRolRequest extends FormRequest
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
            'rol_id' => 'required|unique:permisos_rol,rol_id,NULL,id,permiso_id,' . $request->get('permiso_id'),
            'permiso_id' => 'required|unique:permisos_rol,permiso_id,NULL,id,rol_id,' . $request->get('rol_id'),
        ];
    }

    public function attributes() {
        return [
            'permiso' => 'Permisos',
            'descripcion' => 'Descripción'
        ];
    }
}

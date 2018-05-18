<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsuarioUpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($request->get('id'))
            ],
            'rol_id' => 'required|exists:rol,id',
            'password' => 'nullable|same:c_password|min:8|max:12|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|not_in:' . $request->get('username'),
            'c_password' => 'nullable|same:password',
        ];
    }

    public function attributes() {
        return [
            'name' => 'Nombre',
            'email' => 'E-mail',
            'rol_id' => 'Rol',
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'c_password' => 'Confirmar Contraseña',
        ];
    }
}

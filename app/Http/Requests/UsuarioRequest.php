<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UsuarioRequest extends FormRequest
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
            'email' => 'email|required|unique:users',
            'rol_id' => 'required|exists:rol,id',
            'username' => 'required|unique:users|alpha',
            'password' => 'required|same:c_password|min:8|max:12|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|not_in:' . $request->get('username'),
            'password' => '12345678QWERTqwert@',
            'password' => 'case_diff|numbers|letters|symbols|min:8',
            'c_password' => 'required|same:password',
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

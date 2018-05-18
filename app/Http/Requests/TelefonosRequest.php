<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelefonosRequest extends FormRequest
{

    protected $errorBag = 'telefonos';

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
        $rules = [];
        foreach ($this->request->get('numero') as $key => $value) {
            $rules['numero.' . $key] = 'required|numeric';
        }
        foreach ($this->request->get('tipo') as $key => $value) {
            $rules['tipo.' . $key] = 'required';
        }
        foreach ($this->request->get('extension') as $key => $value) {
            $rules['extension.' . $key] = 'numeric|nullable';
        }
        
        return $rules;
    }

    public function attributes(){
        $attributes = [];
        foreach ($this->request->get('extension') as $key => $value) {
            $attributes['extension.' . $key] = 'Extensión ' . ($key + 1);
        }
        foreach ($this->request->get('tipo') as $key => $value) {
            $attributes['tipo.' . $key] = 'Tipo Teléfono ' . ($key + 1);
        }
        foreach ($this->request->get('numero') as $key => $value) {
            $attributes['numero.' . $key] = 'Número Telefónico ' . ($key + 1);
        }
        return $attributes;
    }

}

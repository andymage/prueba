<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DireccionesRequest extends FormRequest
{

    protected $errorBag = 'direcciones';

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
        foreach ($this->request->get('codigo_postal') as $key => $value) {
            $rules['codigo_postal.' . $key] = 'required|numeric';
        }
        foreach ($this->request->get('calle') as $key => $value) {
            $rules['calle.' . $key] = 'required';
        }
        foreach ($this->request->get('numero') as $key => $value) {
            $rules['numero.' . $key] = 'required';
        }
        foreach ($this->request->get('colonia') as $key => $value) {
            $rules['colonia.' . $key] = 'required';
        }
        foreach ($this->request->get('municipio') as $key => $value) {
            $rules['municipio.' . $key] = 'required';
        }
        foreach ($this->request->get('ciudad') as $key => $value) {
            $rules['ciudad.' . $key] = 'required';
        }
        foreach ($this->request->get('pais') as $key => $value) {
            $rules['pais.' . $key] = 'required';
        }
        foreach ($this->request->get('entidad_federativa') as $key => $value) {
            $rules['entidad_federativa.' . $key] = 'required';
        }
        return $rules;
    }

    public function attributes(){
        $attributes = [];
        foreach ($this->request->get('codigo_postal') as $key => $value) {
            $attributes['codigo_postal.' . $key] = 'Código Postal de la Dirección ' . ($key + 1);
        }
        foreach ($this->request->get('calle') as $key => $value) {
            $attributes['calle.' . $key] = 'Calle de la Dirección ' . ($key + 1);
        }
        foreach ($this->request->get('numero') as $key => $value) {
            $attributes['numero.' . $key] = 'Número de la Dirección ' . ($key + 1);
        }
        foreach ($this->request->get('colonia') as $key => $value) {
            $attributes['colonia.' . $key] = 'Colonia de la Dirección ' . ($key + 1);
        }
        foreach ($this->request->get('municipio') as $key => $value) {
            $attributes['municipio.' . $key] = 'Municipio/Delegación de la Dirección ' . ($key + 1);
        }
        foreach ($this->request->get('ciudad') as $key => $value) {
            $attributes['ciudad.' . $key] = 'Ciudad de la Dirección ' . ($key + 1);
        }
        foreach ($this->request->get('pais') as $key => $value) {
            $attributes['pais.' . $key] = 'País de la Dirección ' . ($key + 1);
        }
        foreach ($this->request->get('entidad_federativa') as $key => $value) {
            $attributes['entidad_federativa.' . $key] = 'Entidad Federativa de la Dirección ' . ($key + 1);
        }
        return $attributes;
    }

}

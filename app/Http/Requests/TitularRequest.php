<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitularRequest extends FormRequest
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
            'correo'=>'unique:personas'
        ];
    }

    public function messages(){
      return [
        'correo.unique' =>'El Titular fué creado, Puedes añadirle esta configuración desde el modulo Titular.'
      ];
    }
}

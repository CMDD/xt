<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPersonaRequest extends FormRequest
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
          'numero_documento'=>'unique:personas'
        ];
    }

    public function messages(){

      return[
        'tipo_persona.required'=>'Por favor, selecciona el tipo de persona.',
        'preferencias.required' =>'Por favor, seleccione alguna preferencia.',
        'numero_documento.unique' =>'El Titular ya se encuentra registrado'
      ];
    }
}

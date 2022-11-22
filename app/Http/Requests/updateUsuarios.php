<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUsuarios extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'password' => 'required',
            'identidad' => 'required',
            'ciudad' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe escribir su nombre',
            'password.required' => 'Debe crear un nuevo Password(clave)',
            'identidad.required' => 'Debe escribir su identidad',
            'ciudad.required' => 'Se ha seleccion una ciudad predeterminada'
        ];
    }
}

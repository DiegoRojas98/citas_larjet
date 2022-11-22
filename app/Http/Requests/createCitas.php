<?php

namespace App\Http\Requests;

use App\Models\rol;
use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Http\FormRequest;

class createCitas extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if( session('rol') == 3){
            return true;
        }else{
            return false;
        }
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'asesor_id' => 'required',
            'fecha' => 'required',
            'hora' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'asesor_id.required' => "Seleccione un asesor.",
            'fecha.required' => "Seleccione una Fecha.",
            'hora.required' => "Selecione una hora"
        ];
    }
}

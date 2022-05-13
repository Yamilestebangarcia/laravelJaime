<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateEmpresaRequest extends FormRequest
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
            "cif" => "required | exists:empresas,cif",
            "nombre" => "required |  max:24 | min:2",
            "telefono" => "required | digits:9| numeric ",
            "web" => "nullable| url",
            "actividad" => "nullable |  max:24 | min:2",
            "tipo" => "nullable |  max:24 | min:2",
            "horario" => "nullable |  max:24 | min:2",
            "observaciones" => "nullable |  max:500 | min:2"
        ];
    }
}

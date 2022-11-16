<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacientRequest extends FormRequest
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
            'name' => 'required|string|',
            'birth_date' => 'nullable|date',
            'cpf' => 'required|string',
            'phone_number_list_id' => 'nullable|string',
            'email' => 'nullable|email',
            'cep' => 'nullable|string',
            'adress' => 'nullable|string',
            'responsable_name' => 'nullable|string',
            'city' => 'string',
            'responsable_cpf' => 'nullable|string',
            'adress_number' => 'nullable|string',
        ];
    }
}

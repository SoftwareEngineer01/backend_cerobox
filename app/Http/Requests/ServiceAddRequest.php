<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceAddRequest extends FormRequest
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
            'customer_id' => 'required|integer',
            'name' => 'required|string',
            'id_type_service' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'observations' => 'required|string',
        ];
    }
}

<?php

namespace miniCRM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          return [
            'first_name' => 'sometimes|required',
            'last_name' => 'sometimes|required',
            'company' => 'sometimes|required|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable',
          ];
        ];
    }
}

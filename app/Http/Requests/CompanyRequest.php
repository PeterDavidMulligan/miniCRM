<?php

namespace miniCRM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use miniCRM\Company;
use miniCRM\Rules\IgnoreUniqueOnSelf;
use Illuminate\Contracts\Validation\Rule;

class CompanyRequest extends FormRequest
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
          'name' => 'sometimes|required|unique:companies',
          'email' => 'nullable|email',
          'logo' => 'nullable|image|dimensions:max_width=100,max_height=100',
          'website' => 'nullable'
        ];
    }
}

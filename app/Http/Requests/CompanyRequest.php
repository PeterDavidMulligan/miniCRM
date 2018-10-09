<?php

namespace miniCRM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'bail|required|unique',
          'email' => 'bail|required|email|unique',
          'logo' => 'bail|image|dimensions:max_width=100,max_height=100',
          'website' => 'unique'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A company name is required.',
            'name.unique' => 'A company with that name already exists.',
            'email.required'  => 'An email address is required.',
            'email.email'  => 'The email field is formatted incorrectly.',
            'email.unique'  => 'A company with that email address already exists.',
            'logo.image' => 'The file uploaded must be an image.',
            'logo.dimensions' => 'A company logo must be below 100 x 100 pixels.',
            'website.unique' => 'A company with this website already exists.'
        ];
    }
}

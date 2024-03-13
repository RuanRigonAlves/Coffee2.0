<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country' => 'required|min:2|max:100',
            'state' => 'required|min:2|max:100',
            'city' => 'required|min:2|max:100',
            'address' => 'required|min:2|max:100',
            'house_num' => 'required|integer|min:1|max:10000'
        ];
    }

    public function messages(): array
    {
        return [
            'country.required' => 'The field is required',
            'state.required' => 'The field is required',
            'city.required' => 'The field is required',
            'address.required' => 'The field is required',
            'house_num.required' => 'The field is required',
            'house_num.integer' => 'It must be a number',
        ];
    }
}

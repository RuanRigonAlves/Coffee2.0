<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5',
            'confirm_password' => 'required|same:password',
            'is_admin' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required for registration.',
            'email.required' => 'We need your email address for registration.',
            'email.email' => 'Your email does not seem to be valid.',
            'email.unique' => 'This email is already in use.',
            'password.required' => 'A password is required.',
            'password.min' => 'Passwords must be at least 5 characters.',
            'confirm_password.required' => 'Please confirm your password.',
            'confirm_password.same' => 'Passwords do not match.',
            'is_admin.required' => 'This field is required'
        ];
    }
}

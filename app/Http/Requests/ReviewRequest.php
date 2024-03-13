<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'review' => 'required|min:4',
            'rating' => 'required|min:1|max:5|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'review.required' => 'This field is required',
            'review.min' => 'Needs at least 4 latters',
            'rating.required' => 'It is required a ratting from 1 to 5',
            'rating.min' => 'It is required a ratting from 1 to 5',
        ];
    }
}

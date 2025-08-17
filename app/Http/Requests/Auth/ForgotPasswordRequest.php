<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Exceptions\HttpValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Please provide your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email address must not exceed 255 characters.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpValidationException($validator);
    }
}

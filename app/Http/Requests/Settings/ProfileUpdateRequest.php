<?php

namespace App\Http\Requests\Settings;

use App\Models\User;
use App\Exceptions\HttpValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            //'email'      => 'required|string|lowercase|email|max:255|unique:users,email',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpValidationException($validator);
    }
}

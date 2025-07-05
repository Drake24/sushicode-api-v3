<?php

namespace App\Exceptions;

use App\Classes\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Exception;

class HttpValidationException extends Exception
{
    public function __construct(public Validator $validator) {}

    public function render(Request $request): JsonResponse
    {
        $errorBag = $this->validator->errors()->toArray();

        return apiResponse()->error($errorBag, 422, 'Oops there are errors in your form.');
    }
}

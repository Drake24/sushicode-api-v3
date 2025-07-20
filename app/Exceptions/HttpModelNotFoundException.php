<?php

namespace App\Exceptions;

use App\Values\Codes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class HttpModelNotFoundException extends Exception
{
    public function __construct(public string $error) {}

    public function render(Request $request): JsonResponse
    {
        return apiResponse()->error($this->error, Codes::HTTP_NOT_FOUND, 'Resource not found');
    }
}

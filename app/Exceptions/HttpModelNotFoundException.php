<?php

namespace App\Exceptions;

use App\Classes\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class HttpModelNotFoundException extends Exception
{
    public function __construct(public string $error) {}

    public function render(Request $request): JsonResponse
    {
        return apiResponse()->error($this->error, 404, 'Resource not found');
    }
}

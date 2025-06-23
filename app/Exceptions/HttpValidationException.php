<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class HttpValidationException extends Exception
{
    public function render(Request $request): JsonResponse
    {
        // Todo
        return response()->json();
    }
}

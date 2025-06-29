<?php

namespace App\Classes;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success(array $data = [], int $code = 200, string $message = 'Success'): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'code' => $code,
            'message' => $message,
        ], $code);
    }

    public static function error(array|string $errors, int $code = 400, string $message = 'Oops something went wrong'): JsonResponse
    {
        return response()->json([
            'errors' => is_array($errors) ? $errors : ['message' => $errors],
            'code' => $code,
            'message' => $message,
        ], $code);
    }
}

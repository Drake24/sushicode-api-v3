<?php

namespace App\Classes;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    // rough draft
    public static function success(array $data = [], int $code = 200, string $message = 'Request succeeded'): JsonResponse
    {
        return response()->json([
            'status' => [
                'code' => $code,
                'message' => $message,
            ],
            'data' => $data,
        ], $code);
    }

    public static function error(array|string $errors, int $code = 400, string $message = 'Request failed'): JsonResponse
    {
        return response()->json([
            'status' => [
                'code' => $code,
                'message' => $message,
            ],
            'errors' => is_array($errors) ? $errors : [$errors],
        ], $code);
    }
}

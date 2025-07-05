<?php

namespace App\Classes;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ApiResponse
{
    /**
     * Create a new response for success response.
     *
     * @param  array $data
     * @param  int $code
     * @param  string  $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success(array|Model|JsonResource|Collection $data = [], int $code = 200, string $message = 'Success'): JsonResponse
    {
        return response()->json(['data' => $data, 'code' => $code, 'message' => $message], $code);
    }

    /**
     * Create a new response for error response.
     *
     * @param  array|string $errors
     * @param  int $code
     * @param  string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error(array|string $errors, int $code = 400, string $message = 'Oops something went wrong'): JsonResponse
    {
        return response()->json([
            'errors' => is_array($errors) ? $errors : ['message' => $errors],
            'code' => $code,
            'message' => $message,
        ], $code);
    }
}

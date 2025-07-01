<?php

use App\Classes\ApiResponse;
use Illuminate\Http\JsonResponse;

if (!function_exists('success')) {

    /**
     * Check the returned HTTP code from the service.
     *
     * @param array $data
     *
     * @return bool
     */
    function success($data, $code, $message, $flatten): JsonResponse
    {
        return ApiResponse::success($data, $code, $message, $flatten);
    }
}

<?php

use App\Classes\ApiResponse;

if (!function_exists('apiResponse')) {
    /**
     * Return a new response from the application.
     * Wrapper function. See ApiResponse::class
     */
    function apiResponse()
    {
        return app(ApiResponse::class);
    }
}

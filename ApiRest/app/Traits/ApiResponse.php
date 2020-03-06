<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{
    /**
     * Build a success response
     * @param string|array $data
     * @param int $code
     * @return use Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * Build error response
     * @param string $message
     * @param int $code
     * @return use Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code )
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }


}
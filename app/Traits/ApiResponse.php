<?php

namespace App\Traits;
use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    protected function success(string $message, mixed $data, int $code = 200): JsonResponse
    {
        if (
            $data instanceof \stdClass &&
            property_exists($data, 'data') &&
            property_exists($data, 'links') &&
            property_exists($data, 'meta')
        ) {
            $data = (array)$data;
            return response()->json([
                'success' => true,
                ...$data,
                'message' => $message,
            ], $code);
        }

        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $code);
    }

    protected function error(string $message, int $code = 422): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }

}

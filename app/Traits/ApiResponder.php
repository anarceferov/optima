<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;


trait ApiResponder
{

    public function dataResponse($data, $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(['content' => $data], $code);
    }


    public function successResponse($message, $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(['success' => $message, 'code' => $code], $code);
    }


    public function errorResponse($message, $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

}

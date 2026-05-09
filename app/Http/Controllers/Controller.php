<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
class Controller extends BaseController
{
     use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success(mixed $data,int $tatusCode=200) : JsonResponse{
        return response()->json(
             $data,
         $tatusCode);
    }

   public function error(array $errorCode, int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'error'   => $errorCode['code'],
            'message' => $errorCode['message'],
        ], $statusCode);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function errorResponse($message = null, $code = 404)
    {
        return response()->json([
          'status'=>'Error',
          'message' => $message
        ], $code);
    }

    public function successResponse($data = null, $message = null, $code = 200)
    {
        return response()->json([
          'status'=> 'Success',
          'message' => $message,
          'data' => $data
        ], $code);
    }
}

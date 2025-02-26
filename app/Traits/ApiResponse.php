<?php

namespace App\Traits;

trait ApiResponse
{
    protected function success($message, $statusCode = 200, $data = null)
    {
        return response()->json([
            'message' => $message,
            'status'  => $statusCode,
            'data'    => $data,
        ], $statusCode);
    }
    protected function error($message, $statusCode, $data = null)
    {
        return response()->json([
            'message' => $message,
            'status'  => $statusCode,
            'data'    => $data,
        ], $statusCode);
    }

    protected function ok($msg, $data = null)
    {
        return $this->success($msg, 200, $data);
    }

    protected function not_found($msg)
    {
        return $this->error($msg, 404);
    }

    protected function forbidden($msg)
    {
        return $this->error($msg, 403);
    }

    protected function unauthorize($msg)
    {
        return $this->error($msg, 401);
    }
}

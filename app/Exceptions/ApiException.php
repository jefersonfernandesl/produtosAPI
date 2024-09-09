<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ApiException extends Exception
{
    protected $message;
    protected $statusCode;
    protected $data;

    public function __construct($message = 'Ocorreu um erro', $statusCode = 400, $data = [])
    {
        parent::__construct($message);
        $this->message = $message;
        $this->statusCode = $statusCode;
        $this->data = $data;
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $this->message,
            'data' => $this->data
        ], $this->statusCode);
    }
}

<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use ApiResponse;

    public function store(): JsonResponse
    {
        try {
//            return $this->success('Login efetuado com sucesso!');
        } catch (\Exception $exception) {
            return $this->error('Server Error'.$exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Actions\User\RegisterUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterUserRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    use ApiResponse;

    public function register(RegisterUserRequest $request, RegisterUser $registerUser): JsonResponse
    {
        try {
            $registerUser->handle($request->validated());

            return $this->success('Usuário registrado com sucesso!', []);
        } catch (\Exception $e) {
            return $this->error('Erro ao registrar usuário' .$e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

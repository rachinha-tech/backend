<?php

namespace App\Http\Controllers\User;

use App\Actions\User\LoginUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use ApiResponse;

    public function store(LoginUserRequest $request, LoginUser $login): JsonResponse
    {
        try {
            [$token, $user] = $login->handle($request->validated());

            $data = [
                'token' => $token,
                'user' => $user
            ];

            return $this->success('Login efetuado com sucesso.', $data);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao efetuar login', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(): JsonResponse
    {
        try {
            Auth::user()->currentAccessToken()->delete();
            return $this->success('Logout realizado com sucesso.', [], Response::HTTP_NO_CONTENT);
        } catch (\Exception) {
            return $this->error('Erro ao fazer logout.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

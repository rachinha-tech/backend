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
            if (Auth::check()) {
                $user = Auth::user()->currentAccessToken();
                $user->delete();
                return response()->json(['message' => 'Logout realizado com sucesso.'], Response::HTTP_NO_CONTENT);
            } else {
                return response()->json(['message' => 'Usuário não autenticado.'], Response::HTTP_UNAUTHORIZED);
            }
        } catch (\Exception $exception) {
            return $this->error('Erro ao fazer logout.' . $exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

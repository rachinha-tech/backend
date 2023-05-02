<?php

namespace App\Http\Controllers;

use App\Actions\AuthStore;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use ApiResponse;

    public function redirectToProvider(): JsonResponse
    {
        return \Illuminate\Support\Facades\Response::json([
            'url' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl(),
        ]);
    }
    public function handleProviderCallback(AuthStore $authStore): JsonResponse
    {
        try {
            return $this->success('Login efetuado com sucesso!', $authStore->handle());
        } catch (\Exception $exception) {
            return $this->error('Server Error'.$exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Actions\AuthStore;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse as RedirectResponseHTTP;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use ApiResponse;

    public function redirectToProvider(): RedirectResponseHTTP|RedirectResponse
    {
        return Socialite::driver('google')->redirect();
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

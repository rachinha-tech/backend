<?php

namespace App\Http\Controllers;

use App\Actions\AuthStore;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\RedirectResponse as RedirectResponseHTTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function handleProviderCallback(AuthStore $authStore)
    {
        try {
            $authStore->handle();
        } catch (\Exception $exception) {
            return $this->error('Server Error'.$exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

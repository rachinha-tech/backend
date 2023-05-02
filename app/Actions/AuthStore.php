<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthStore
{
    public function handle(): JsonResponse
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $existingUser = User::where('email', $googleUser->getEmail())->first();

        if ($existingUser) {
            Auth::login($existingUser);

            $accessToken = $existingUser->createToken('authToken')->accessToken;

            return response()->json([
                'access_token' => $accessToken,
            ]);

        }

        $newUser = User::create([
            'google_id' => $googleUser->id,
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => bcrypt(Str::random(40)),
            'picture' => $googleUser->avatar,
            'token' => $googleUser->token,
            'active' => true
        ]);

        Auth::login($newUser);

        $accessToken = $newUser->createToken('authToken')->accessToken;

        return response()->json([
            'access_token' => $accessToken,
        ]);
    }
}

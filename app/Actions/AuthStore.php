<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthStore
{
    public function handle(): array
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $existingUser = User::where('google_id', $googleUser->id)->first();

        if ($existingUser) {
            Auth::login($existingUser);

            $accessToken = $existingUser->createToken('authToken');

             return [
                'token' => $accessToken->plainTextToken,
                'user' => Auth::authenticate()
            ];
        }

        $newUser = User::create([
            'google_id' => $googleUser->id,
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => bcrypt(Str::random(40)),
            'picture' => $googleUser->avatar,
            'active' => true
        ]);

        Auth::login($newUser);

        $accessToken = $newUser->createToken('authToken');

        return [
            'token' => $accessToken->plainTextToken,
            'user' => Auth::authenticate()
        ];
    }
}

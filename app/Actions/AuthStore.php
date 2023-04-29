<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthStore
{
    public function handle(): RedirectResponse|Model
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::query()->updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'picture' => $googleUser->avatar,
            'token' => $googleUser->token,
            'active' => true
        ]);

        Auth::login($user);

        return redirect('/welcome');
    }
}

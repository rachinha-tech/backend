<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginUser
{
    public function handle(array $data)
    {
        $credentials = ['active' => true, ...$data];

        if (!Auth::attempt($credentials)) {
            throw new \DomainException('Informações de login incorreta.', Response::HTTP_BAD_REQUEST);
        }

        /** @var User $user */
        $user = Auth::user();

        $user->tokens()->delete();

        return [
            $user->createToken('authToken')->plainTextToken,
            $user,
        ];

    }
}

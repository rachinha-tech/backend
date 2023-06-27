<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RegisterUser
{
    public function handle(array $data): Builder|Model
    {
        $user = User::query()->create([
            'email' => $data['email'],
            'login' => $data['login'],
            'name' => $data['name'],
            'date_birth' => $data['date_birth'],
            'level' => $data['level'],
            //'picture' => $data['picture'],
            'password' => $data['password'],
            'password_confirmation' => $data['password_confirmation'],
        ]);

        auth()->login($user);

        return $user;
    }
}

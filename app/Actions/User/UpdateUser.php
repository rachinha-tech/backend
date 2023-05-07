<?php

namespace App\Actions\User;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UpdateUser
{
    public function handle(int $id, array $data): UserResource
    {
        $user = User::query()
            ->where('id', $id)
            ->first();

        if(!$user) {
           return throw new \DomainException('Usuário não encontrado', Response::HTTP_NOT_FOUND);
        }

        $user->update($data);

        return UserResource::make($user);
    }
}

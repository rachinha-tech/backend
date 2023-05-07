<?php

namespace App\Actions\User;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class ShowUser
{
    public function handle(int $id): UserResource
    {
        $user = User::query()->find($id);

        if(!$user) {
            throw new \DomainException('Usuário não encontrado', Response::HTTP_NOT_FOUND);
        }

        return UserResource::make($user);
    }
}

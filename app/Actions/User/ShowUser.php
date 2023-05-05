<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class ShowUser
{
    public function handle(int $id): Model
    {
        $user = User::query()->find($id);

        if(!$user) {
            throw new \DomainException('Usuário não encontrado', Response::HTTP_NOT_FOUND);
        }

        return $user;
    }
}

<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class LevelUser
{
    public function handle(int $id, array $data): Model
    {
        $user = User::query()->where('id', $id)->first();

        if (!$user) {
            throw new \DomainException('Usuário não encontrado!', Response::HTTP_NOT_FOUND);
        }

        if (!$user->level) {
            throw new \DomainException('Nível informado não encontrado!', Response::HTTP_NOT_FOUND);
        }

        $user->update($data);

        return $user;
    }
}

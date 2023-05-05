<?php

namespace App\Actions\User;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class DestroyUser
{
    public function handle(int $id): void
    {
        $user = User::query()->firstWhere('id', $id);

        if (!$user) {
            throw new \DomainException('Usúario não encontrado!', Response::HTTP_NOT_FOUND);
        }

        $user->update([
            'deleted_at' => now(),
            'active' => false
        ]);
    }
}

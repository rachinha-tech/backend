<?php

namespace App\Actions\Local;

use App\Models\Local;
use Symfony\Component\HttpFoundation\Response;

class DestroyLocal
{
    public function handle(int $id): void
    {
        $local = Local::query()
            ->where('id', $id)
            ->first();

        if (!$local) {
            throw new \DomainException('Local não encontrado!', Response::HTTP_NOT_FOUND);
        }

        $local->update([
            'deleted_at' => now()
        ]);
    }
}

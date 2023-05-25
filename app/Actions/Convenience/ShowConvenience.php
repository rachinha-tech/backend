<?php

namespace App\Actions\Convenience;

use App\Models\Convenience;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class ShowConvenience
{
    public function handle(int $id): Model
    {
        $convenience = Convenience::query()
            ->where('id', $id)
            ->first();

        if (!$convenience) {
            throw new \DomainException('Comodidade não encontrada.', Response::HTTP_NOT_FOUND);
        }

        return $convenience;
    }
}

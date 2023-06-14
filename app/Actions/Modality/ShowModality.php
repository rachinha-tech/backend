<?php

namespace App\Actions\Modality;

use App\Models\Modality;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class ShowModality
{
    public function handle(int $id): Model
    {
        $modality = Modality::query()->where('id', $id)->first();

        if(!$modality) {
            throw new \DomainException('Modalidade não encontrada', Response::HTTP_NOT_FOUND);
        }

        return $modality;
    }
}

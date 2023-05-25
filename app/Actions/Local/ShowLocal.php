<?php

namespace App\Actions\Local;

use App\Models\Local;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class ShowLocal
{
    public function handle(int $id): Model
    {
        $local = Local::query()
                    ->where('id', $id)
                    ->first();

        if(!$local) {
            throw new \DomainException('Local não encontrado.', Response::HTTP_NOT_FOUND);
        }

        $local->get();

        return $local;
    }
}

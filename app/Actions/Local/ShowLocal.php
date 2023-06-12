<?php

namespace App\Actions\Local;

use App\Http\Resources\Local\LocalResource;
use App\Models\Local;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ShowLocal
{
    public function handle(): LocalResource
    {
        $user = Auth::user();

        $local = Local::query()
            ->where('proprietary_id', $user->id)
            ->first();

        if (!$local) {
            throw new \DomainException('Local não encontrado.', Response::HTTP_NOT_FOUND);
        }

        return LocalResource::make($local);
    }
}

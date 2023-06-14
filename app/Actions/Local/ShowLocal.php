<?php

namespace App\Actions\Local;

use App\Http\Resources\Local\LocalResource;
use App\Models\Local;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ShowLocal
{
    public function handle(int $id = null): LocalResource|Model
    {
        if ($id) {
            return Local::query()
                ->where('id', $id)
                ->with('schedule')
                ->first();
        }

        $user = Auth::user();

        $local = Local::query()
            ->where('proprietary_id', $user->id)
            ->with('schedule')
            ->first();


        if (!$local) {
            throw new \DomainException('Local não encontrado.', Response::HTTP_NOT_FOUND);
        }

        return LocalResource::make($local);
    }
}

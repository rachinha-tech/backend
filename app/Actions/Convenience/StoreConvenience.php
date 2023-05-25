<?php

namespace App\Actions\Convenience;

use App\Models\Convenience;
use App\Models\Local;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StoreConvenience
{
    public function handle(array $data): Model
    {
        $user = Auth::user();

        if ($user->level !== 'owner') {
            throw new \DomainException('Usuário sem permissão para cadastrar comodidades!', Response::HTTP_UNAUTHORIZED);
        }

        $local = Local::query()
            ->where('id', $data['local_id'])
            ->first();

        if (!$local) {
            throw new \DomainException('Local não informado!', Response::HTTP_BAD_REQUEST);
        }

        return Convenience::query()
            ->create([
                'local_id' => $local->id,
                'name' => $data['name']
            ]);
    }
}

<?php

namespace App\Actions\Local;

use App\Models\Local;
use App\Models\Modality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StoreLocal
{
    public function handle(array $data): Model
    {
        $user = Auth::user();

        if($user->level !== 'owner') {
            throw new \DomainException('Usuário não contém permissão para cadastrar um local.', Response::HTTP_UNAUTHORIZED);
        };

        $modality = Modality::query()->where('id', $data['modality_id'])->first();

        if (!$modality) {
            throw new \DomainException('É necessário informar um modalidade!', Response::HTTP_FORBIDDEN);
        }

        $local = Local::query()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'url_image' => $data['url_image'],
            'modality_id' => $data['modality_id'],
            'value_of_hour' => $data['value_of_hour'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
//            'convenience_id' => $data['convenience_id'],
        ]);

        return $local;
    }
}

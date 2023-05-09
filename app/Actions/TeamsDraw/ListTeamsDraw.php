<?php

namespace App\Actions\TeamsDraw;

use App\Models\Modality;
use Symfony\Component\HttpFoundation\Response;

class ListTeamsDraw
{
    public function handle(array $data): array
    {
        $quantityTeams = $data['quantity_teams'];
        $teams = [];

        if (!$quantityTeams) {
            throw new \DomainException('É necessário informar a quntidade de teams.', Response::HTTP_FORBIDDEN);
        }

        if (!$data['modality_id']) {
            throw new \DomainException('É necessário informar uma modalidade.', Response::HTTP_FORBIDDEN);
        }

        $quantityPlayersTeam = Modality::query()
            ->where('id', $data['modality_id'])
            ->first();

        for ($i = 0; $i < $quantityTeams; $i++) {
            $teams[] = array();
        }

        shuffle($data['players']);

        // itera sobre cada time
        for ($i = 0; $i < $quantityTeams; $i++) {
            // adiciona jogadores ao time atual até que ele alcance a quantidade desejada
            while (count($teams[$i]) < $quantityPlayersTeam->quantity_players) {
                // pega o próximo jogador disponível
                $player = array_shift($data['players']);
                // adiciona o jogador ao time atual
                array_push($teams[$i], $player);
                // se o array de jogadores estiver vazio, sai do loop
                if (empty($data['players'])) {
                    break;
                }
            }
        }

        return $teams;

    }
}

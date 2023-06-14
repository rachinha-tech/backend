<?php

namespace App\Actions\TeamsDraw;

use Symfony\Component\HttpFoundation\Response;

class ListTeamsDraw
{
    public function handle(array $data): array
    {
        $quantityTeams = $data['quantity_teams'];
        $quantityPlayers = $data['quantity_players'];
        $teams = [];

        if (!$quantityTeams) {
            throw new \DomainException('É necessário informar a quntidade de teams.', Response::HTTP_FORBIDDEN);
        }

        if (!$quantityPlayers) {
            throw new \DomainException('É necessário informar a quantidade de jogadores por time.', Response::HTTP_FORBIDDEN);
        }

        for ($i = 0; $i < $quantityTeams; $i++) {
            $teams[] = array();
        }

        shuffle($data['players']);

        // itera sobre cada time
        for ($i = 0; $i < $quantityTeams; $i++) {
            // adiciona jogadores ao time atual até que ele alcance a quantidade desejada
            while (count($teams[$i]) < $quantityPlayers) {
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

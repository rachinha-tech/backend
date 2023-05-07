<?php

namespace App\Actions\TeamsDraw;

class ListTeamsDraw
{
    public array $teams = [
        'one' => [],
        'two' => [],
    ];

    public function handle(array $data): array
    {
        shuffle($data);

        $limit = count($data)/2;

        if(count($this->teams['one']) < $limit) {
            $one = array_slice($data, 0, $limit);
            array_push($this->teams['one'], $one);
        }

        if (count($this->teams['two']) < $limit) {
            $two = array_slice($data, $limit, 8);
            array_push($this->teams['two'], $two);
        }

        return $this->teams;
    }
}

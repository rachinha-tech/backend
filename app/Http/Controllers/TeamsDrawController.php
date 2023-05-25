<?php

namespace App\Http\Controllers;

use App\Actions\TeamsDraw\ListTeamsDraw;
use App\Http\Requests\TeamsDraw\TeamsDrawRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TeamsDrawController extends Controller
{
    use ApiResponse;

    public function store(TeamsDrawRequest $request, ListTeamsDraw $teamsDraw): JsonResponse
    {
        try {
            return $this->success('Sorteio realizado!', $teamsDraw->handle($request->validated()));
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao sortear equipes.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

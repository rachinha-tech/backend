<?php

namespace App\Http\Controllers;

use App\Actions\Event\EventStore;
use App\Http\Requests\Event\EventStoreRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    use ApiResponse;


    public function store(EventStoreRequest $request, EventStore $eventStore): JsonResponse
    {
        try {
            $event = $eventStore->handle($request->validated());
            return $this->success('Evento registrado!', $event);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao registar evento.' , Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id)
    {
        //
    }
}

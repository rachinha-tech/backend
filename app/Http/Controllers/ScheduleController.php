<?php

namespace App\Http\Controllers;

use App\Actions\Schedule\ScheduleStore;
use App\Http\Requests\Schedule\ScheduleStoreRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ScheduleController extends Controller
{
    use ApiResponse;

    public function index()
    {
        //
    }


    public function store(ScheduleStoreRequest $request, ScheduleStore $scheduleStore): JsonResponse
    {
        try {
            $schedule = $scheduleStore->handle($request->validated());
            return $this->success('Horário cadastrado!', $schedule);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception $exception) {
            return $this->error('Erro ao cadastrar agenda'.$exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }


    public function show(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}

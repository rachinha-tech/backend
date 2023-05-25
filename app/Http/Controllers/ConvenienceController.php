<?php

namespace App\Http\Controllers;

use App\Actions\Convenience\ShowConvenience;
use App\Actions\Convenience\StoreConvenience;
use App\Http\Requests\Convenience\StoreConvenienceRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ConvenienceController extends Controller
{
    use ApiResponse;

    public function store(StoreConvenienceRequest $request, StoreConvenience $storeConvenience): JsonResponse
    {
        try {
            $convenience = $storeConvenience->handle($request->validated());
            return $this->success('Comodidade criado com sucesso!', $convenience);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao cadastrar comodidade.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id, ShowConvenience $showConvenience): JsonResponse
    {
        try {
            $convenience = $showConvenience->handle($id);
            return $this->success('Comodidade listada com sucesso!', $convenience);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao listar comodidade.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}

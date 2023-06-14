<?php

namespace App\Http\Controllers;

use App\Actions\Modality\ListModality;
use App\Actions\Modality\ShowModality;
use App\Actions\Modality\StoreModality;
use App\Actions\Modality\UpdateModality;
use App\Http\Requests\Modality\StoreModalityRequest;
use App\Http\Requests\UpdateModalityRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ModalityController extends Controller
{
    use ApiResponse;

    public function index(ListModality $listModality): JsonResponse
    {
        try {
            return $this->success('Modalidades listadas com sucesso!', $listModality->handle());
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao listar modalidades', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id, ShowModality $showModality): JsonResponse
    {
        try {
            return $this->success('Modalidade listada com sucesso!', $showModality->handle($id));
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao listar modalidade', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(StoreModalityRequest $request, StoreModality $storeModality): JsonResponse
    {
        try {
            $modality = $storeModality->handle($request->validated());
            return $this->success('Modalidades listadas com sucesso!', $modality);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao listar modalidades', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(UpdateModalityRequest $request, UpdateModality $updateModality): JsonResponse
    {
        try {
            $modality = $updateModality->handle($request->validated());
            return $this->success('Modalidade atualizada com sucesso!', $modality);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao atualizar modalidade', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

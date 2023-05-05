<?php

namespace App\Http\Controllers;

use App\Actions\Modality\ListModality;
use App\Actions\Modality\StoreModality;
use App\Http\Requests\Modality\StoreModalityRequest;
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
}

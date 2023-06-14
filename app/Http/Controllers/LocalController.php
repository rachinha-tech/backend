<?php

namespace App\Http\Controllers;

use App\Actions\Local\DestroyLocal;
use App\Actions\Local\ListLocal;
use App\Actions\Local\ShowLocal;
use App\Actions\Local\StoreLocal;
use App\Actions\Local\UpdateLocal;
use App\Http\Requests\Local\StoreLocalRequest;
use App\Http\Requests\Local\UpdateLocalRequest;
use App\Traits\ApiResponse;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LocalController extends Controller
{
    use ApiResponse;

    public function index(ListLocal $listLocal): JsonResponse
    {
        try {
            return $this->success('Locais listados com sucesso.', $listLocal->handle());
        } catch (\Exception) {
            return $this->error('Erro ao listar locais.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function store(StoreLocalRequest $request, StoreLocal $storeLocal): JsonResponse
    {
        try {
            $local = $storeLocal->handle($request->validated());
            return $this->success('Local criado com sucesso.', $local);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception $e) {
            return $this->error('Erro ao criar local.'.$e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function my(ShowLocal $showLocal): JsonResponse
    {
        try {
            return $this->success('Local listado com sucesso.', $showLocal->handle());
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao listar local.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id, ShowLocal $showLocal): JsonResponse
    {
        try {
            return $this->success('Local listado com sucesso.', $showLocal->handle($id));
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao listar local.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(int $id, UpdateLocalRequest $request, UpdateLocal $updateLocal): JsonResponse
    {
        try {
            $local = $updateLocal->handle($id, $request->validated());
            return $this->success('Local atualizado com sucesso!', $local);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao atualizar local.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id, DestroyLocal $destroyLocal): JsonResponse
    {
        try {
            $destroyLocal->handle($id);
            return $this->success('Local excluído com sucesso!', []);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao excluir local.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

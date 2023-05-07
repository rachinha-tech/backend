<?php

namespace App\Http\Controllers\User;

use App\Actions\User\DestroyUser;
use App\Actions\User\LevelUser;
use App\Actions\User\ShowUser;
use App\Actions\User\UpdateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LevelUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    use ApiResponse;

    public function show(int $id, ShowUser $showUser): JsonResponse
    {
        try {
            $user = $showUser->handle($id);
            return $this->success('Informações de usuário listada!', $user);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao listar informações de usuário.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function level(int $id, LevelUserRequest $request, LevelUser $levelUser): JsonResponse
    {
        try {
            $level = $levelUser->handle($id, $request->validated());
            return $this->success('Nível alterado com sucesso!', $level);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao alterar nível.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(int $id, UpdateUserRequest $request, UpdateUser $updateUser): JsonResponse
    {
        try {
            $user = $updateUser->handle($id, $request->validated());
            return $this->success('Informações atualizadas com sucesso!', $user);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception $exception) {
            return $this->error('Erro ao atualizar informações.'.$exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function destroy(int $id, DestroyUser $destroyUser): JsonResponse
    {
        try {
            $destroyUser->handle($id);
            return $this->success('Usuário excluído com sucesso!', []);
        } catch (\DomainException $domainException) {
            return $this->error($domainException->getMessage(), $domainException->getCode());
        } catch (\Exception) {
            return $this->error('Erro ao excluir usuário.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
